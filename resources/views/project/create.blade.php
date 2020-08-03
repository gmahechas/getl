@extends('layouts.app')

@section('content')
    <h1>Crear Proyecto</h1>
    <form method="POST" action="{{ route('project.store') }}">
    @csrf
        <div class="form-row">
            <label>Id Portafolio</label>
            <input type="text" name="macroproject_id" class="form-control" value="{{ old('macroproject_id') }}">
        </div>
        <div class="form-row">
            <label>Proyecto</label>
            <input type="text" name="project_name" class="form-control" value="{{ old('project_name') }}">
        </div>
        <div class="form-row">
            <label>Financiamiento</label>
            <input type="text" name="project_financing" class="form-control" value="{{ old('project_financing') }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
