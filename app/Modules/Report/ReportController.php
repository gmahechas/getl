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
        $sum_invoice_count_operations = 0;
        $sum_invoice_count = 0;
        $secondTable = [];
        $tempsaSC = 0;
        $tempsaCAP = 0;
        $totalTemps = 0;
        $tempsaSCPercent = 0;
        $tempsaCAPPercent = 0;
        $totalPercent = 0;
        $secondTableWithPercent = [];

        if(count($data) != 0) {

            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $sql_where = '';
            $sql_where_sub_count_invoices = '';
            if($data['invoice_status_date_start'] && $data['invoice_status_date_end']) {
                $sql_where = ' AND ins.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end . '"';
                $sql_where_sub_count_invoices = ' AND sub_ins.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end . '"';
            }

            $sql = 'SELECT ins.status_id AS status_id, ins.status_description AS status_description, AVG(IFNULL(ins.invoice_status_date_diff, 0)) AS invoice_status_date_diff,
                    (SELECT COUNT(DISTINCT(sub_ins.invoice_id_ref))
                     FROM invoice_status sub_ins
                     WHERE sub_ins.status_id = ins.status_id '.$sql_where_sub_count_invoices.') AS  invoice_count,
                    (SELECT COUNT(sub_ins.invoice_id_ref)
                     FROM invoice_status sub_ins
                     WHERE sub_ins.status_id = ins.status_id '.$sql_where_sub_count_invoices.') AS  invoice_count_operations
                    FROM invoice_status_view ins
                    WHERE 1=1 '.$sql_where.'
                    GROUP BY ins.status_id
                    ORDER BY ins.status_order';

            $entities = DB::select($sql);

            foreach ($entities as $key => $entity) {
                if($entity->status_id != 10 && $entity->status_id != 11) {
                    $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
                }
                $sum_invoice_count_operations += $entity->invoice_count_operations;
                $sum_invoice_count += $entity->invoice_count;
            }

            $secondTable = $this->secondTable($entities);
            $tempsaSC = $this->calculateTempsaSC($secondTable);


            $indexTempsaCAP = array_search('CAP', array_column($secondTable, 'newStatus'));
            $tempsaCAP = $secondTable[$indexTempsaCAP+1]['invoice_status_date_diff'];

            $totalTemps = $tempsaSC + $tempsaCAP;

            $tempsaSCPercent = ($tempsaSC / $totalTemps) * 100;
            $tempsaCAPPercent = ($tempsaCAP / $totalTemps) * 100;
            $totalPercent = $tempsaSCPercent + $tempsaCAPPercent;

            $secondTableWithPercent = $this->calculatePercent($secondTable, $tempsaSC);
        }

        return view('report.avg_invoice_status')->with([
            'entities' => $entities,
            'data' => $data,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff,
            'sum_invoice_count_operations' => $sum_invoice_count_operations,
            'sum_invoice_count' => $sum_invoice_count,
            'secondTable' => $secondTableWithPercent,
            'tempsaSC' => $tempsaSC,
            'tempsaSCPercent' => $tempsaSCPercent,
            'tempsaCAP' => $tempsaCAP,
            'tempsaCAPPercent' => $tempsaCAPPercent,
            'totalTemps' => $totalTemps,
            'totalPercent' => $totalPercent
        ]);
    }

    public function count_invoice_status(Request $request)
    {
        $entities = DB::select('SELECT i.status_description AS status_description, COUNT(*) AS count_status_id
                                FROM invoice_view i
                                GROUP BY i.status_id
                                ORDER BY i.status_id');

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
            1 => [
                'status' => [1,2,3],
                'newStatus' => 'Agent 1'
            ],
            2 => [
                'status' => [4,5],
                'newStatus' => 'CP'
            ],
            3 => [
                'status' => [6,7],
                'newStatus' => 'Autorisée CSC'
            ],
            4 => [
                'status' => [8,8],
                'newStatus' => 'Agent 2'
            ],
            5 => [
                'status' => [9,9],
                'newStatus' => 'CAP'
            ],
        ];

        $newArray = [];

        foreach ($pivots as $key => $pivot) {
            $partialSum = 0;
            foreach ($newEntities as $entity) {
                if (in_array($entity['status_id'], $pivot['status'])) {
                    $partialSum += $entity['invoice_status_date_diff'];
                }
            }

            $newArray[$key] = [
                'newStatus' => $pivot['newStatus'],
                'invoice_status_date_diff' => $partialSum
            ];

        }

        return $newArray;
    }

    private function calculateTempsaSC($invoice_status)
    {

        $pivots = [1,2,3,4];

        $sum = 0;

        foreach ($invoice_status as $key => $status) {
            if (in_array($key, $pivots)) {
                $sum += $status['invoice_status_date_diff'];
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
                $status['percent'] = ($status['invoice_status_date_diff'] / $tempsaSC) * 100;
                $returnArray[] = $status;
            }
        }

        return $returnArray;
    }
}
