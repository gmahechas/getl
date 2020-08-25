<?php

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\InvoiceStatus\InvoiceStatusView;
use App\Modules\Status\Status;

class InvoiceViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = $request->all();
        $entities = [];

        if(count($data) != 0) {

            $id_ref = $data['id_ref'];
            $invoice_number = $data['invoice_number'];
            $invoice_date_start = $data['invoice_date_start'];
            $invoice_date_end = $data['invoice_date_end'];
            $status_id = $data['status_id'];

            $entities = InvoiceView::when($id_ref, function ($query) use ($id_ref) {
                return $query->where('id_ref', '=', $id_ref);
            })->when($invoice_number, function ($query) use ($invoice_number) {
                return $query->where('invoice_number', '=', $invoice_number);
            })->when(($invoice_date_start && $invoice_date_end), function ($query) use ($invoice_date_start, $invoice_date_end) {
                return $query->whereBetween('invoice_date', [$invoice_date_start, $invoice_date_end]);
            })->when($status_id, function ($query) use ($status_id) {
                return $query->where('status_id', '=', $status_id);
            })->get();

        }
        $status = Status::all(['id', 'status_description'])->toArray();
        array_unshift($status, ['id' => '', 'status_description' => '------']);
        return view('invoice.index')->with([
            'entities' => $entities,
            'data' => $data,
            'status' => $status
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceView $invoice)
    {
        $invoice_status = InvoiceStatusView::where('invoice_id_ref', $invoice->id_ref)->get();
        $invoice_status_array = $invoice_status->toArray();

        $sum_invoice_status_date_diff = 0;
        $secondTable = [];
        $tempsaSC = 0;
        $tempsaCAP = 0;
        $totalTemps = 0;
        $tempsaSCPercent = 0;
        $tempsaCAPPercent = 0;
        $totalPercent = 0;

        if(count($invoice_status_array) != 0) {
            foreach ($invoice_status as $key => $entity) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
            $secondTable = $this->secondTable($invoice_status_array);
            $tempsaSC = $this->calculateTempsaSC($secondTable); // puede ser 0

            $indexTempsaCAP = array_search('CAP', array_column($secondTable, 'newStatus'));
            $tempsaCAP = ($secondTable[$indexTempsaCAP+1]['invoice_status_date_diff'] != '') ? $secondTable[$indexTempsaCAP+1]['invoice_status_date_diff'] : 0;

            $totalTemps = $tempsaSC + $tempsaCAP;

            if($totalTemps > 0) {
                $tempsaSCPercent = ($tempsaSC / $totalTemps) * 100;
                $tempsaCAPPercent = ($tempsaCAP / $totalTemps) * 100;
            }

            $totalPercent = $tempsaSCPercent + $tempsaCAPPercent;
            $secondTableWithPercent = $this->calculatePercent($secondTable, $tempsaSC);
        }

        return view('invoice.show')->with([
            'entity' => $invoice,
            'entities' => $invoice_status,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff,
            'secondTable' => $secondTableWithPercent,
            'tempsaSC' => $tempsaSC,
            'tempsaSCPercent' => $tempsaSCPercent,
            'tempsaCAP' => $tempsaCAP,
            'tempsaCAPPercent' => $tempsaCAPPercent,
            'totalTemps' => $totalTemps,
            'totalPercent' => $totalPercent
        ]);
    }

    private function secondTable($invoice_status)
    {

        $pivots = [
            1 => [
                'first' => 1,
                'last' => 4,
                'newStatus' => 'Agent 1'
            ],
            2 => [
                'first' => 4,
                'last' => 6,
                'newStatus' => 'CP'
            ],
            3 => [
                'first' => 6,
                'last' => 8,
                'newStatus' => 'Autorisée CSC'
            ],
            4 => [
                'first' => 8,
                'last' => 9, // change this for 9
                'newStatus' => 'Agent 2'
            ],
            5 => [
                'first' => 9,
                'last' => 10,
                'newStatus' => 'CAP'
            ],
        ];

        $newArray = [];
        $columns = array_column($invoice_status, 'status_id');

        foreach ($pivots as $key => $pivot) {



            $firstKey = array_search($pivot['first'], $columns);
            $lastKey = array_search($pivot['last'], array_reverse($columns));


            if($firstKey !== false && $lastKey !== false) {
                $firstValue = $invoice_status[$firstKey];
                $lastValue = array_reverse($invoice_status)[$lastKey];

                $firstDate = date_create($firstValue['invoice_status_date']);
                $lastDate = date_create($lastValue['invoice_status_date']);
                $diff = $diff=date_diff($firstDate, $lastDate);
                $days = $diff->days + ($diff->h / 24);

                $newArray[$key] = [
                    'newStatus' => $pivot['newStatus'],
                    'invoice_status_date_start' => $firstValue['invoice_status_date'],
                    'invoice_status_date_end' => $lastValue['invoice_status_date'],
                    'invoice_status_date_diff' => $days
                ];
            } else {
                $newArray[$key] = [
                    'newStatus' => $pivot['newStatus'],
                    'invoice_status_date_start' => '',
                    'invoice_status_date_end' => '',
                    'invoice_status_date_diff' => 0
                ];
            }

        }

        return $newArray;
    }

    private function calculateTempsaSC($invoice_status)
    {

        $pivots = [1,2,3,4];

        $sum = 0;

        foreach ($invoice_status as $key => $status) {
            if (in_array($key, $pivots)) {
                $sum += ($status['invoice_status_date_diff'] != '') ? $status['invoice_status_date_diff'] : 0;
            }
        }

        return $sum;
    }

    private function calculatePercent($invoice_status, $tempsaSC)
    {
        $pivots = [1,2,3,4,5];
        $returnArray = [];

        foreach ($invoice_status as $key => $status) {

            if (in_array($key, $pivots)) {

                if($status['invoice_status_date_start'] != '' && $status['invoice_status_date_end'] != '') {
                    if($tempsaSC > 0.00) {
                        $status['percent'] = ($status['invoice_status_date_diff'] / $tempsaSC) * 100;
                    } else {
                        $status['percent'] = 0;
                    }

                } else {
                    $status['percent'] = 0;
                }

                $returnArray[] = $status;

            }

        }

        return $returnArray;
    }

}
