<?php

namespace App\Modules\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActivityViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activity.index')->with([
            'entities' => ActivityView::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(ActivityView $activity)
    {
        return view('activity.show')->with([
            'entity' => $activity
        ]);
    }
}
