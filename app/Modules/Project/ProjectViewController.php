<?php

namespace App\Modules\Project;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.index')->with([
            'entities' => ProjectView::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Project\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectView $project)
    {
        return view('project.show')->with([
            'project' => $project
        ]);
    }
}
