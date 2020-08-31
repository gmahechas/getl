<?php

namespace App\Modules\Indicators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicatorsController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->all();
        if(count($data) != 0) {
            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $avg = $this->avg($invoice_status_date_start, $invoice_status_date_end);

            echo '<pre>' . print_r($avg, true) . '</pre>';
        }

        return view('indicators.index')->with([
        ]);
    }

    private function avg($invoice_status_date_start, $invoice_status_date_end) {

        $sum_invoice_status_date_diff = 0;
        $sql = 'SELECT ins.status_id AS status_id, ins.status_description AS status_description, AVG(IFNULL(ins.invoice_status_date_diff, 0)) AS invoice_status_date_diff
                FROM invoice_status_view ins
                WHERE ins.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"
                GROUP BY ins.status_id
                ORDER BY ins.status_order';

        $entities = DB::select($sql);

        foreach ($entities as $key => $entity) {
            if($entity->status_id != 10 && $entity->status_id != 11) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
        }

        return [
            'avg' => $entities,
            'sum_avg' => $sum_invoice_status_date_diff
        ];

    }
}
