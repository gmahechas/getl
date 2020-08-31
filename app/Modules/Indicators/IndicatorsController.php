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

            $indicator_1 = $this->indicator_1_2(1, $invoice_status_date_start, $invoice_status_date_end);
            $indicator_2 = $this->indicator_1_2(10, $invoice_status_date_start, $invoice_status_date_end);
            $indicator_3 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '>');
            $indicator_4 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '<=');
        }

        return view('indicators.index')->with([
            'data' => $data,
            'indicator_1' => $indicator_1,
            'indicator_2' => $indicator_2,
            'indicator_3' => $indicator_3,
            'indicator_4' => $indicator_4
        ]);
    }

    private function indicator_1_2($status_id, $invoice_status_date_start, $invoice_status_date_end) {

        $sum_invoice_status_date_diff = 0;
        $sql = 'SELECT COUNT(DISTINCT(ita.invoice_id_ref)) AS count_invoices, IFNULL(AVG(ita.duration), 0) AS avg_duration
                FROM invoice_time_avg ita
                WHERE ita.status_id = '.$status_id.' AND ita.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"';

        $entities = DB::select($sql);

        return [
            'result' => $entities,
        ];

    }

    private function indicator_3_4($status_id, $invoice_status_date_start, $invoice_status_date_end, $comparation) {

        $sum_invoice_status_date_diff = 0;
        $sql = 'SELECT COUNT(DISTINCT(ita.invoice_id_ref)) AS count_invoices, IFNULL(AVG(ita.duration), 0) AS avg_duration
                FROM invoice_time_avg ita
                WHERE ita.status_id = '.$status_id.' AND ita.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"
                AND ita.duration '. $comparation. ' 30';

        $entities = DB::select($sql);

        return [
            'result' => $entities,
        ];

    }
}
