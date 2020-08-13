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
    public function index(Request $request)
    {
        $data = $request->all();
        $entities = [];

        if(count($data) != 0) {

            $id_ref = $data['id_ref'];
            $invoice_number = $data['invoice_number'];
            $invoice_date_start = $data['invoice_date_start'];
            $invoice_date_end = $data['invoice_date_end'];
            $invoice_status_status = $data['invoice_status_status'];

            $entities = InvoiceView::when($id_ref, function ($query) use ($id_ref) {
                return $query->where('id_ref', '=', $id_ref);
            })->when($invoice_number, function ($query) use ($invoice_number) {
                return $query->where('invoice_number', '=', $invoice_number);
            })->when(($invoice_date_start && $invoice_date_end), function ($query) use ($invoice_date_start, $invoice_date_end) {
                return $query->whereBetween('invoice_date', [$invoice_date_start, $invoice_date_end]);
            })->when($invoice_status_status, function ($query) use ($invoice_status_status) {
                return $query->where('invoice_status_status', 'like', '%'.$invoice_status_status.'%');;
            })->get();

        }
        return view('invoice.index')->with([
            'entities' => $entities,
            'data' => $data
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
        $invoice_status = InvoiceStatusView::where('invoice_id_ref', $invoice->id_ref)->orderBy('invoice_status_date', 'desc')->get();
        return view('invoice.show')->with([
            'entity' => $invoice,
            'entities' => $invoice_status
        ]);
    }
}
