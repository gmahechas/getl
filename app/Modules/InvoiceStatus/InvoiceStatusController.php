<?php

namespace App\Modules\InvoiceStatus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice_status.index')->with([
            'entities' => InvoiceStatus::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceStatusRequest $request)
    {
        $entity = InvoiceStatus::create($request->validated());
        return redirect()->route('invoice_status.index')->with(['success' => "The invoice status {$entity->id} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function show(InvoiceStatus $invoice_status)
    {
        return view('invoice_status.show')->with([
            'entity' => $invoice_status
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(InvoiceStatus $invoice_status)
    {
        return view('invoice_status.edit')->with([
            'entity' => $invoice_status
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceStatusRequest $request, InvoiceStatus $invoiceStatus)
    {
        $invoiceStatus->update($request->validated());
        return redirect()->route('invoice_status.index')->with(['success' => "The invoice status {$invoiceStatus->id} was updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InvoiceStatus  $invoiceStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(InvoiceStatus $invoice_status)
    {
        $invoice_status->delete();
        return redirect()->route('invoice_status.index')->with(['success' => "The invoice status {$invoice_status->id_ref} was destroyed"]);
    }
}
