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

            $entities = DB::select('SELECT ins.status_description AS status_description, AVG(ins.invoice_status_date_diff) AS invoice_status_date_diff
                                    FROM invoice_status_view ins
                                    WHERE 1=1 '.$sql_where.'
                                    GROUP BY ins.status_id');

            foreach ($entities as $key => $entity) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
        }
        return view('report.avg_invoice_status')->with([
            'entities' => $entities,
            'data' => $data,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff
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
}
