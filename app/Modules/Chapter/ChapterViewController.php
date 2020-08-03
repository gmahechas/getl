<?php

namespace App\Modules\Chapter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChapterViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chapter.index')->with([
            'entities' => ChapterView::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Chapter\ChapterView  $chapterView
     * @return \Illuminate\Http\Response
     */
    public function show(ChapterView $chapter)
    {
        return view('chapter.show')->with([
            'entity' => $chapter
        ]);
    }
}
