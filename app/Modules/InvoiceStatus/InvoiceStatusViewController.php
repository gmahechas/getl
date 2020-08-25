<?php

namespace App\Modules\InvoiceStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceStatusViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entities = [];
        return view('invoice_status.index')->with([
            'entities' => $entities
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

}
