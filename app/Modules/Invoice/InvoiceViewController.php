<?php

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\InvoiceStatus\InvoiceStatusView;

class InvoiceViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.index')->with([
            'entities' => InvoiceView::all()
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
        $invoice_status = InvoiceStatusView::where('invoice_id', $invoice->id)->orderBy('invoice_status_date', 'desc')->get();
        return view('invoice.show')->with([
            'entity' => $invoice,
            'entities' => $invoice_status
        ]);
    }
}
