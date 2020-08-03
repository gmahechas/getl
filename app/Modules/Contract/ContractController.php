<?php

namespace App\Modules\Contract;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Activity\Activity;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contract.index')->with([
            'entities' => Contract::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all(['id', 'activity_name']);
        return view('contract.create')->with(['activities' => $activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContractRequest $request)
    {
        $entity = Contract::create($request->validated());
        return redirect()->route('contract.index')->with(['success' => "The contract {$entity->id_ref} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        return view('contract.show')->with([
            'entity' => $contract
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $activities = Activity::all(['id', 'activity_name']);
        return view('contract.edit')->with([
            'entity' => $contract,
            'activities' => $activities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(ContractRequest $request, Contract $contract)
    {
        $contract->update($request->validated());
        return redirect()->route('contract.index')->with(['success' => "The contract {$contract->id_ref} was updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        return redirect()->route('contract.index')->with(['success' => "The contract {$contract->id_ref} was destroyed"]);
    }
}
