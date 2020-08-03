@extends('layouts.app')

@section('content')
    <h1>Actividad: {{ $entity->activity_name }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $entity->id_ref }}</div>
    </div>
    <div class="form-row">
        <label>Lote de Trabajo: </label>
        <div>{{ $entity->chapter_name }}</div>
    </div>
    <div class="form-row">
        <label>Financiamiento: </label>
        <div>{{ $entity->activity_budgeted }}</div>
    </div>
@endsection
