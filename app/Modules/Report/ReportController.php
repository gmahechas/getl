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

            $entities  = $this->search_avg($invoice_status_date_start, $invoice_status_date_end);

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

    public function avg_invoice_status_french(Request $request)
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

            $entities  = $this->search_avg($invoice_status_date_start, $invoice_status_date_end);

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

        return view('report.avg_invoice_status_french')->with([
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

    public function search_avg($invoice_status_date_start, $invoice_status_date_end)
    {
        $sql_where = '';
        $sql_where_sub_count_invoices = '';
        if($invoice_status_date_start && $invoice_status_date_end) {
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

        return $entities = DB::select($sql);
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

    public function secondTable($entities)
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

    public function calculateTempsaSC($invoice_status)
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

    public function calculatePercent($invoice_status, $tempsaSC)
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

    public function index_responsable(Request $request)
    {
        $data = $request->all();
        $entities = [];

        if(count($data) != 0) {
            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $sql = 'SELECT st.status_description, ist.status_id, ist.invoice_status_responsable, count(ist.id) as count_invoice,
                    (
                        SELECT AVG(sub_isv.invoice_status_date_diff)
                        FROM invoice_status_view sub_isv
                        WHERE sub_isv.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"
                        AND sub_isv.status_id = ist.status_id
                        AND sub_isv.invoice_status_responsable = ist.invoice_status_responsable
                    ) AS avg_invoice_status_date_diff
                    FROM invoice_status ist
                    JOIN status st ON st.id = ist.status_id
                    WHERE ist.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"
                    GROUP BY ist.status_id, ist.invoice_status_responsable';

            $entities = DB::select($sql);
        }

        return view('report.index-responsable')->with([
            'data' => $data,
            'entities' => $entities,
        ]);
    }

    public function cap_report(Request $request) {
        $data = $request->all();
        $entities = [];
        $total = 0;

        if(count($data) != 0) {
            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $sql_where = '';
            if($invoice_status_date_start && $invoice_status_date_end) {
                $sql_where = ' and sub.invoice_status_date between "'.$invoice_status_date_start.'" and "'.$invoice_status_date_end . '"';
            }
            
            $sql = "select status_id AS status_id, status_description AS status_description, AVG(IFNULL(invoice_status_date_diff, 0)) AS invoice_status_date_diff
                    from invoice_status_view
                    where invoice_id_ref in (select distinct sub.invoice_id_ref
                    from invoice_status sub
                    where sub.status_id = 9 $sql_where)
                    group by status_id
                    order by status_order";

            $entities = DB::select($sql);
            $xtotal = DB::select("select count(distinct sub.invoice_id_ref) as total
                                from invoice_status sub
                                where sub.status_id = 9 $sql_where");
            $total = $xtotal[0]->total;
        }

        return view('report.cap_report')->with([
            'data' => $data,
            'entities' => $entities,
            'total' => $total
        ]);
    }
}
