<?php

namespace App\Modules\InvoiceStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceStatusViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice_status.index')->with([
            'entities' => InvoiceStatusView::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceStatus  $invoice_status
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceStatusView $invoice_status)
    {
        return view('invoice_status.show')->with([
            'entity' => $invoice_status
        ]);
    }

    public function avg_invoice_status(Request $request)
    {
        $data = $request->all();
        $entities = [];

        $sum_invoice_status_date_diff = 0;

        if(count($data) != 0) {
            $invoice_status_date_start = $data['invoice_status_date_start'];
            $invoice_status_date_end = $data['invoice_status_date_end'];

            $entities = DB::select('SELECT ins.invoice_status_status AS invoice_status_status, AVG(ins.invoice_status_date_diff) AS invoice_status_date_diff
                                    FROM invoice_status_view ins
                                    WHERE ins.invoice_status_date BETWEEN "'.$invoice_status_date_start.'" AND "'.$invoice_status_date_end.'"
                                    GROUP BY ins.invoice_status_status');
            foreach ($entities as $key => $entity) {
                $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
            }
        }
        return view('invoice_status.avg')->with([
            'entities' => $entities,
            'data' => $data,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff
        ]);;
    }
}
