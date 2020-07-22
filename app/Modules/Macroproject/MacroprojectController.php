<?php

namespace App\Modules\Macroproject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MacroprojectController extends Controller
{
    public function index()
    {
        return view('macroproject.index')->with([
            'macroprojects' => Macroproject::all()
        ]);
    }

    public function create()
    {
        return view('macroproject.create');
    }

    public function store()
    {
        $rules = [
            'macroproject_name' => ['required', 'max:255']
        ];
        request()->validate($rules);
        $entity = Macroproject::create(request()->all());
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$entity->macroproject_name} was created"]);
    }

    public function show($macroproject)
    {
        return view('macroproject.show')->with([
            'macroproject' => Macroproject::findOrFail($macroproject)
        ]);
    }

    public function edit($macroproject)
    {
        return view('macroproject.edit')->with([
            'macroproject' => Macroproject::findOrFail($macroproject)
        ]);
    }

    public function update($macroproject)
    {
        $rules = [
            'macroproject_name' => ['required', 'max:255']
        ];
        request()->validate($rules);
        $entity = Macroproject::findOrFail($macroproject);
        $entity->update(request()->all());
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$entity->macroproject_name} was updated"]);;
    }

    public function destroy($macroproject)
    {
        $entity = Macroproject::findOrFail($macroproject);
        $entity->delete();
        return redirect()->route('macroproject.index')->with(['success' => "The macroproject {$entity->macroproject_name} was destroyed"]);
    }
}
