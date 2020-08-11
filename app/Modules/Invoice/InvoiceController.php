<?php

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Contract\Contract;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('invoice.index')->with([
            'entities' => Invoice::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::all(['id', 'id_ref', 'contract_provider', 'contract_budgeted']);
        return view('invoice.create')->with(['contracts' => $contracts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $entity = Invoice::create($request->validated());
        return redirect()->route('invoice.index')->with(['success' => "The invoice {$entity->id_ref} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoice.show')->with([
            'entity' => $invoice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $contracts = Contract::all(['id', 'id_ref']);
        return view('invoice.edit')->with([
            'entity' => $invoice,
            'contracts' => $contracts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->validated());
        return redirect()->route('invoice.index')->with(['success' => "The invoice {$invoice->id_ref} was updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index')->with(['success' => "The invoice {$invoice->id_ref} was destroyed"]);
    }
}
