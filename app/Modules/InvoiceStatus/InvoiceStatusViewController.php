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
    public function index(Request $request)
    {
        $data = $request->all();
        $entities = [];

        if(count($data) != 0) {
            $id_ref = $data['id_ref'];

            $entities = InvoiceStatusView::when($id_ref, function ($query) use ($id_ref) {
                return $query->where('invoice_id_ref', '=', $id_ref);
            })->get();

        }

        return view('invoice_status.index')->with([
            'entities' => $entities,
            'data' => $data,
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
