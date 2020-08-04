@extends('layouts.app')

@section('content')
    <h1>Actividad: {{ $entity->activity_name }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>Actividad: </strong>{{ $entity->activity_name }}</div>
            </div>
            <div class="form-row">
                <div><strong>Presupuesto: </strong>{{ $entity->activity_budgeted }}</div>
            </div>
            <div class="form-row">
                <div><strong>Lote de Trabajo: </strong>{{ $entity->chapter_name }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('activity.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>
@endsection
