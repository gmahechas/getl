@extends('layouts.app')

@section('content')
    <h1>Proyecto: {{ $project->project_name }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $project->id_ref }}</div>
    </div>
    <div class="form-row">
        <label>Portafolio: </label>
        <div>{{ $project->macroproject_name }}</div>
    </div>
    <div class="form-row">
        <label>Financiamiento: </label>
        <div>{{ $project->project_financing }}</div>
    </div>
@endsection
