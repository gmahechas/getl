<?php

namespace App\Modules\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Project\Project;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chapter.index')->with([
            'entities' => Chapter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all(['id', 'project_name']);
        return view('chapter.create')->with(['projects' => $projects]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChapterRequest $request)
    {
        $entity = Chapter::create($request->validated());
        return redirect()->route('chapter.index')->with(['success' => "The chapter {$entity->chapter_name} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Chapter\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function show(Chapter $chapter)
    {
        return view('chapter.show')->with([
            'entity' => $chapter
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Chapter\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter)
    {
        $projects = Project::all(['id', 'project_name']);
        return view('chapter.edit')->with([
            'entity' => $chapter,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Chapter\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(ChapterRequest $request, Chapter $chapter)
    {
        $chapter->update($request->validated());
        return redirect()->route('chapter.index')->with(['success' => "The chapter {$chapter->chapter_name} was updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Chapter\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter)
    {
        $chapter->delete();
        return redirect()->route('chapter.index')->with(['success' => "The chapter {$chapter->chapter_name} was destroyed"]);
    }
}
