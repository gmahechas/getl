<?php

namespace App\Modules\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = ContractView::all();
        foreach ($contracts as $key => $contract) {
            $contracts[$key]->diff_with_sum_invoices = $contract->contract_budgeted - $contract->sum_invoices;
        }
        return view('contract.index')->with([
            'entities' => $contracts
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(ContractView $contract)
    {
        return view('contract.show')->with([
            'entity' => $contract
        ]);
    }
}
