<?php

namespace App\Modules\Activity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\Chapter\Chapter;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('activity.index')->with([
            'entities' => Activity::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chapters = Chapter::all(['id', 'chapter_name']);
        return view('activity.create')->with(['chapters' => $chapters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ActivityRequest $request)
    {
        $entity = Activity::create($request->validated());
        return redirect()->route('activity.index')->with(['success' => "The activity {$entity->activity_name} was created"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('activity.show')->with([
            'entity' => $activity
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modules\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        $chapters = Chapter::all(['id', 'chapter_name']);
        return view('activity.edit')->with([
            'entity' => $activity,
            'chapters' => $chapters
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(ActivityRequest $request, Activity $activity)
    {
        $activity->update($request->validated());
        return redirect()->route('activity.index')->with(['success' => "The activity {$activity->activity_name} was updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activity.index')->with(['success' => "The activity {$activity->activity_name} was destroyed"]);
    }
}
