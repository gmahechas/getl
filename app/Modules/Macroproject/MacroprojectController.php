<?php

namespace App\Modules\Macroproject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MacroprojectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('macroproject.index')->with([
            'macroprojects' => Macroproject::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('macroproject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MacroprojectRequest $request)
    {
        $entity = Macroproject::create($request->validated());
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$entity->macroproject_name} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Macroproject\Macroproject  $macroproject
     * @return \Illuminate\Http\Response
     */
    public function show(Macroproject $macroproject)
    {
        return view('macroproject.show')->with([
            'macroproject' => $macroproject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Macroproject\Macroproject  $macroproject
     * @return \Illuminate\Http\Response
     */
    public function edit(Macroproject $macroproject)
    {
        return view('macroproject.edit')->with([
            'macroproject' => $macroproject
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Macroproject\Macroproject  $macroproject
     * @return \Illuminate\Http\Response
     */
    public function update(MacroprojectRequest $request, Macroproject $macroproject)
    {
        $macroproject->update($request->validated());
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$macroproject->macroproject_name} was updated"]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Macroproject\Macroproject  $macroproject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Macroproject $macroproject)
    {
        $macroproject->delete();
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$macroproject->macroproject_name} was destroyed"]);
    }
}
