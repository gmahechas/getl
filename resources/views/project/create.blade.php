@extends('layouts.app')

@section('content')
    <h1>Create Macrocroproject</h1>
    <form method="POST" action="{{ route('project.store') }}">
    @csrf
        <div class="form-row">
            <label>Macroproject's id</label>
            <input type="text" name="macroproject_id" class="form-control" value="{{ old('macroproject_id') }}">
        </div>
        <div class="form-row">
            <label>Project's name</label>
            <input type="text" name="project_name" class="form-control" value="{{ old('project_name') }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
