@extends('layouts.app')

@section('content')
    <h1>Proyecto: {{ $entity->chapter_name }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $entity->id_ref }}</div>
    </div>
    <div class="form-row">
        <label>Portafolio: </label>
        <div>{{ $entity->project_name }}</div>
    </div>
    <div class="form-row">
        <label>Financiamiento: </label>
        <div>{{ $entity->chapter_budgeted }}</div>
    </div>
@endsection
