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
        $invoice_status = InvoiceStatusView::where('invoice_id_ref', $invoice->id_ref)->orderBy('invoice_status_date', 'desc')->get();

        $sum_invoice_status_date_diff = 0;
        foreach ($invoice_status as $key => $entity) {
            $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
        }

        $secondTable = $this->secondTable($invoice_status);
        $tempsaSC = $this->calculateTempsaSC($secondTable);

        $indexTempsaCAP = array_search(6, array_column($secondTable, 'status_id'));
        $tempsaCAP = $secondTable[$indexTempsaCAP]['invoice_status_date_diff'];

        $totalTemps = $tempsaSC + $tempsaCAP;

        $tempsaSCPercent = ($tempsaSC / $totalTemps) * 100;
        $tempsaCAPPercent = ($tempsaCAP / $totalTemps) * 100;
        $totalPercent = $tempsaSCPercent + $tempsaCAPPercent;

        $secondTableWithPercent = $this->calculatePercent($secondTable, $tempsaSC);

        return view('invoice.show')->with([
            'entity' => $invoice,
            'entities' => $invoice_status,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff,
            'secondTableWithPercent' => $secondTableWithPercent,
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
            1 => 'Agent 1',
            2 => 'CP',
            3 => 'CSC',
            5 => 'Agent 2',
            6 => 'CAP',
        ];

        $returnArray = [];
        $convertedToArray = array_reverse($invoice_status->toArray());

        foreach ($pivots as $key => $pivot) {

            $invoiceStatusByStatus = array_keys(array_column($convertedToArray, 'status_id'), $key);
            $newArray = [];
            foreach ($invoiceStatusByStatus as $key => $invoiceStatus) {
                $newItem =  $convertedToArray[$invoiceStatus];
                $newItem['newStatus'] = $pivot;
                $newArray[] = $newItem;
            }
            $returnArray[] = end($newArray);

        }
        return $returnArray;
    }

    private function calculateTempsaSC($invoice_status)
    {

        $pivots = [1,2,3,5];

        $sum = 0;

        foreach ($invoice_status as $key => $status) {
            if (in_array($status['status_id'], $pivots)) {
                $sum += $status['invoice_status_date_diff'];
            }
        }

        return $sum;
    }

    private function calculatePercent($invoice_status, $tempsaSC)
    {

        $pivots = [1,2,3,5,6];

        $returnArray = [];
        foreach ($invoice_status as $key => $status) {
            if (in_array($status['status_id'], $pivots)) {
                $status['percent'] = ($status['invoice_status_date_diff'] / $tempsaSC) * 100;
                $returnArray[] = $status;
            }
        }

        return $returnArray;
    }

}
