@extends('layouts.app')

@section('content')
    <h1>Proyecto: {{ $entity->project_name }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>Portafolio: </strong>{{ $entity->macroproject_name }}</div>
            </div>
            <div class="form-row">
                <div><strong>Financiamiento: </strong>{{ $entity->project_financing }}</div>
            </div>
            <div class="form-row">
                <a href="{{ route('project.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>
@endsection
