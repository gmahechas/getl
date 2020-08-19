<?php

namespace App\Modules\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\InvoiceStatus\InvoiceStatusView;
use App\Modules\Status\Status;

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
            $status_id = $data['status_id'];

            $entities = InvoiceView::when($id_ref, function ($query) use ($id_ref) {
                return $query->where('id_ref', '=', $id_ref);
            })->when($invoice_number, function ($query) use ($invoice_number) {
                return $query->where('invoice_number', '=', $invoice_number);
            })->when(($invoice_date_start && $invoice_date_end), function ($query) use ($invoice_date_start, $invoice_date_end) {
                return $query->whereBetween('invoice_date', [$invoice_date_start, $invoice_date_end]);
            })->when($status_id, function ($query) use ($status_id) {
                return $query->where('status_id', '=', $status_id);
            })->get();

        }
        $status = Status::all(['id', 'status_description'])->toArray();
        array_unshift($status, ['id' => '', 'status_description' => '------']);
        return view('invoice.index')->with([
            'entities' => $entities,
            'data' => $data,
            'status' => $status
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

        $sum_invoice_status_date_diff = 0;
        foreach ($invoice_status as $key => $entity) {
            $sum_invoice_status_date_diff += $entity->invoice_status_date_diff;
        }

        return view('invoice.show')->with([
            'entity' => $invoice,
            'entities' => $invoice_status,
            'sum_invoice_status_date_diff' => $sum_invoice_status_date_diff
        ]);
    }
}
