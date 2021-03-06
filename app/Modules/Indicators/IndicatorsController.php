<?php

namespace App\Modules\Indicators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Modules\Report\ReportController;

class IndicatorsController extends Controller
{

    protected $ReportController;
    public function __construct(ReportController $ReportController)
    {
        $this->ReportController = $ReportController;
    }

    public function index(Request $request)
    {
        $data = $request->all();

        $indicator_1 = [];
        $indicator_2 = [];
        $indicator_3 = [];
        $indicator_4 = [];

        if(count($data) != 0) {
            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $indicator_1 = $this->indicator_1_2(1, $invoice_status_date_start, $invoice_status_date_end); //recibidas
            $indicator_2 = $this->indicator_1_2(10, $invoice_status_date_start, $invoice_status_date_end); //pagadas
            $indicator_3 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '>'); // mayor 30 dias
            $indicator_4 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '<='); // menor o igual 30 dias
        }

        return view('indicators.index')->with([
            'data' => $data,
            'indicator_1' => $indicator_1,
            'indicator_2' => $indicator_2,
            'indicator_3' => $indicator_3,
            'indicator_4' => $indicator_4
        ]);
    }

    public function index_french(Request $request)
    {
        $data = $request->all();

        $indicator_1 = [];
        $indicator_2 = [];
        $indicator_3 = [];
        $indicator_4 = [];

        if(count($data) != 0) {
            $invoice_status_date_start = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_start']));
            $invoice_status_date_end = date('Y-m-d H:i:s', strtotime($data['invoice_status_date_end']));

            $indicator_1 = $this->indicator_1_2(1, $invoice_status_date_start, $invoice_status_date_end); //recibidas
            $indicator_2 = $this->indicator_1_2(10, $invoice_status_date_start, $invoice_status_date_end); //pagadas
            $indicator_3 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '>'); // mayor 30 dias
            $indicator_4 = $this->indicator_3_4(10, $invoice_status_date_start, $invoice_status_date_end, '<='); // menor o igual 30 dias
        }

        return view('indicators.index-french')->with([
            'data' => $data,
            'indicator_1' => $indicator_1,
            'indicator_2' => $indicator_2,
            'indicator_3' => $indicator_3,
            'indicator_4' => $indicator_4
        ]);
    }

    public function index_by_months(Request $request)
    {
        $data = $request->all();

        $result = [];
        $num_of_months = 0;

        if(count($data) != 0 && isset($data['months'])) {
            $num_of_months = count($data['months']);
            foreach ($data['months'] as $month) {

                $indicator_1 = [];
                $indicator_2 = [];
                $indicator_3 = [];
                $indicator_4 = [];

                $date = $data['year'].'-'.$month.'-01';
                $last_day = date('t', strtotime($date));

                $month_name = date('M', strtotime($date));
                $start_date = $date . ' 00:00';
                $end_date = $data['year'].'-'.$month.'-'.$last_day . ' 23:00';

                $indicator_1 = $this->indicator_1_2(1, $start_date, $end_date); //recibidas
                $indicator_2 = $this->indicator_1_2(10, $start_date, $end_date); //pagadas
                $indicator_3 = $this->indicator_3_4(10, $start_date, $end_date, '>'); // mayor 30 dias
                $indicator_4 = $this->indicator_3_4(10, $start_date, $end_date, '<='); // menor o igual 30 dias

                $secondTable = $this->connectRepportController($start_date, $end_date);

                $result[] = [
                    'month_name' => $month_name,
                    'indicator_1' => $indicator_1,
                    'indicator_2' => $indicator_2,
                    'indicator_3' => $indicator_3,
                    'indicator_4' => $indicator_4,
                    'secondTable' => $secondTable
                ];

            }

        }

        // echo '<pre>' . print_r($result, true) . '</pre>';

        return view('indicators.index-by-months')->with([
            'data' => $data,
            'result' => $result,
            'num_of_months' => $num_of_months
        ]);
    }

    public function index_by_months_french(Request $request)
    {
        $data = $request->all();

        $result = [];
        $num_of_months = 0;

        if(count($data) != 0 && isset($data['months'])) {
            $num_of_months = count($data['months']);
            foreach ($data['months'] as $month) {

                $indicator_1 = [];
                $indicator_2 = [];
                $indicator_3 = [];
                $indicator_4 = [];

                $date = $data['year'].'-'.$month.'-01';
                $last_day = date('t', strtotime($date));

                $month_name = date('M', strtotime($date));
                $start_date = $date . ' 00:00';
                $end_date = $data['year'].'-'.$month.'-'.$last_day . ' 23:00';

                $indicator_1 = $this->indicator_1_2(1, $start_date, $end_date); //recibidas
                $indicator_2 = $this->indicator_1_2(10, $start_date, $end_date); //pagadas
                $indicator_3 = $this->indicator_3_4(10, $start_date, $end_date, '>'); // mayor 30 dias
                $indicator_4 = $this->indicator_3_4(10, $start_date, $end_date, '<='); // menor o igual 30 dias

                $secondTable = $this->connectRepportController($start_date, $end_date);

                $result[] = [
                    'month_name' => $month_name,
                    'indicator_1' => $indicator_1,
                    'indicator_2' => $indicator_2,
                    'indicator_3' => $indicator_3,
                    'indicator_4' => $indicator_4,
                    'secondTable' => $secondTable
                ];

            }

        }

        return view('indicators.index-by-months-french')->with([
            'data' => $data,
            'result' => $result,
            'num_of_months' => $num_of_months
        ]);
    }

    private function indicator_1_2($status_id, $invoice_status_date_start, $invoice_status_date_end)
    {

        $sum_invoice_status_date_diff = 0;
        $sql = 'SELECT COUNT(DISTINCT(ita.invoice_id_ref)) AS count_invoices, IFNULL(AVG(ita.duration), 0) AS avg_duration
                FROM invoice_time_avg ita
                WHERE ita.status_id = '.$status_id.' AND ita.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"';

        $entities = DB::select($sql);

        return [
            'result' => $entities,
        ];

    }

    private function indicator_3_4($status_id, $invoice_status_date_start, $invoice_status_date_end, $comparation)
    {

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

    public function connectRepportController($invoice_status_date_start, $invoice_status_date_end)
    {

        $sum_invoice_status_date_diff = 0;
        $sum_invoice_count_operations = 0;
        $sum_invoice_count = 0;

        $entities  = $this->ReportController->search_avg($invoice_status_date_start, $invoice_status_date_end);

        foreach ($entities as $key => $entity) {
            if($entity->status_id != 10 && $entity->status_id != 11) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
            $sum_invoice_count_operations += $entity->invoice_count_operations;
            $sum_invoice_count += $entity->invoice_count;
        }

        $secondTable = $this->ReportController->secondTable($entities);
        $tempsaSC = $this->ReportController->calculateTempsaSC($secondTable);

        $indexTempsaCAP = array_search('CAP', array_column($secondTable, 'newStatus'));
        $tempsaCAP = $secondTable[$indexTempsaCAP+1]['invoice_status_date_diff'];

        $totalTemps = $tempsaSC + $tempsaCAP;

        $tempsaSCPercent = ($tempsaSC / $totalTemps) * 100;
        $tempsaCAPPercent = ($tempsaCAP / $totalTemps) * 100;
        $totalPercent = $tempsaSCPercent + $tempsaCAPPercent;

        $secondTableWithPercent = $this->ReportController->calculatePercent($secondTable, $tempsaSC);

        return  [
            'secondTableFirstPart' => $secondTableWithPercent,
            'tempsaSC' => $tempsaSC,
            'tempsaSCPercent' => $tempsaSCPercent,
            'tempsaCAP' => $tempsaCAP,
            'tempsaCAPPercent' => $tempsaCAPPercent,
            'totalTemps' => $totalTemps,
            'totalPercent' => $totalPercent
        ];
    }
}
