<?php

namespace App\Modules\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function avg_invoice_status(Request $request)
    {
        $data = $request->all();
        $entities = [];

        $sum_invoice_status_date_diff = 0;

        if(count($data) != 0) {

            $invoice_status_date_start = $data['invoice_status_date_start'];
            $invoice_status_date_end = $data['invoice_status_date_end'];

            $sql_where = '';
            if($data['invoice_status_date_start'] && $data['invoice_status_date_end']) {
                $sql_where = ' AND ins.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end . '"';
            }

            $entities = DB::select('SELECT ins.status_id AS status_id, ins.status_description AS status_description, AVG(ins.invoice_status_date_diff) AS invoice_status_date_diff
                                    FROM invoice_status_view ins
                                    WHERE 1=1 '.$sql_where.'
                                    GROUP BY ins.status_id');

            foreach ($entities as $key => $entity) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
        }

        $secondTable = $this->secondTable($entities);
        $tempsaSC = $this->calculateTempsaSC($secondTable);

        $indexTempsaCAP = array_search(6, array_column($secondTable, 'status_id'));
        $tempsaCAP = $secondTable[$indexTempsaCAP]['invoice_status_date_diff'];

        $totalTemps = $tempsaSC + $tempsaCAP;

        $tempsaSCPercent = ($tempsaSC / $totalTemps) * 100;
        $tempsaCAPPercent = ($tempsaCAP / $totalTemps) * 100;
        $totalPercent = $tempsaSCPercent + $tempsaCAPPercent;

        $secondTableWithPercent = $this->calculatePercent($secondTable, $tempsaSC);

        return view('report.avg_invoice_status')->with([
            'entities' => $entities,
            'data' => $data,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff,
            'secondTableWithPercent' => $secondTableWithPercent,
            'tempsaSC' => $tempsaSC,
            'tempsaSCPercent' => $tempsaSCPercent,
            'tempsaCAP' => $tempsaCAP,
            'tempsaCAPPercent' => $tempsaCAPPercent,
            'totalTemps' => $totalTemps,
            'totalPercent' => $totalPercent
        ]);;
    }

    public function count_invoice_status(Request $request)
    {
        $entities = DB::select('SELECT i.status_description AS status_description, COUNT(*) AS count_status_id
                                FROM invoice_view i
                                GROUP BY i.status_id');

        return view('report.count_invoice_status')->with([
            'entities' => $entities
        ]);;
    }

    private function secondTable($entities)
    {

        $newEntities = [];
        foreach ($entities as $value) {
            $newEntities[] =  json_decode(json_encode($value), true);
        }

        $pivots = [
            1 => 'Agent 1',
            2 => 'CP',
            3 => 'CSC',
            5 => 'Agent 2',
            6 => 'CAP',
        ];

        $returnArray = [];
        $convertedToArray = array_reverse($newEntities);

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
