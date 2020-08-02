@extends('layouts.app')

@section('content')
    <h1>Edit Project</h1>
    <form method="POST" action="{{ route('project.update', ['project' => $project->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Macroproject's Name</label>
            <input type="text" name="macroproject_id" class="form-control" value="{{ $project->macroproject_id }}">
        </div>
        <div class="form-row">
            <label>Project's Name</label>
            <input type="text" name="project_name" class="form-control" value="{{ $project->project_name }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
