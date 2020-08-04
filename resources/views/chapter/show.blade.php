@extends('layouts.app')

@section('content')
    <h1>Proyecto: {{ $entity->chapter_name }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>Lote de Trabajo: </strong>{{ $entity->chapter_name}}</div>
            </div>
            <div class="form-row">
                <div><strong>Presupuesto: </strong>{{ $entity->chapter_budgeted }}</div>
            </div>
            <div class="form-row">
                <div><strong>Proyecto: </strong>{{ $entity->project_name }}</div>
            </div>
        </div>
    </div>
@endsection
