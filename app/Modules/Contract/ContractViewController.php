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
        return view('contract.index')->with([
            'entities' => ContractView::all()
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
