@extends('layouts.app')

@section('content')
    <h1>Editar Proyecto: {{ $project->project_name }}</h1>
    <form method="POST" action="{{ route('project.update', ['project' => $project->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Portafolio</label>
            <select name="macroproject_id" class="form-control">
                @foreach ($macroprojects as $macroproject)
                    <option value="{{ $macroproject->id }}" {{ $macroproject->id === $project->macroproject_id ? 'selected' : '' }}>{{ $macroproject->macroproject_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ $project->id_ref }}">
        </div>
        <div class="form-row">
            <label>Proyecto</label>
            <input type="text" name="project_name" class="form-control" value="{{ $project->project_name }}">
        </div>
        <div class="form-row">
            <label>Financiamiento</label>
            <input type="text" name="project_financing" class="form-control" value="{{ $project->project_financing }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
