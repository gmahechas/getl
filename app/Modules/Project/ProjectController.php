<?php

namespace App\Modules\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Macroproject\Macroproject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index')->with([
            'entities' => Project::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $macroprojects = Macroproject::all(['id', 'macroproject_name']);
        return view('project.create')->with(['macroprojects' => $macroprojects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $entity = Project::create($request->validated());
        return redirect()->route('project.index')->with(['success' => "The project {$entity->project_name} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Project\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('project.show')->with([
            'project' => $project
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Project\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $macroprojects = Macroproject::all(['id', 'macroproject_name']);
        return view('project.edit')->with([
            'project' => $project,
            'macroprojects' => $macroprojects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Project\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        return redirect()->route('project.index')->with(['success' => "The project {$project->project_name} was updated"]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Project\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index')->with(['success' => "The project {$project->project_name} was destroyed"]);
    }
}
