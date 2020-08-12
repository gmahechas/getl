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

    public function avg_invoice_status()
    {
        $rows = DB::select('SELECT ins.invoice_status_status AS invoice_status_status, AVG(ins.invoice_status_date_diff) AS invoice_status_date_diff
                            FROM invoice_status_view ins
                            GROUP BY ins.invoice_status_status');
        return view('invoice_status.avg')->with([
            'entities' => $rows
        ]);;
    }
}
