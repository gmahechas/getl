<?php

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('invoice.show')->with([
            'entity' => $invoice
        ]);
    }
}
