@extends('layouts.app')

@section('content')
    <h1>Id: {{ $entity->id }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Estado: </strong>{{ $entity->invoice_status_status }}</div>
            </div>
            <div class="form-row">
                <div><strong>Fecha: </strong>{{ $entity->invoice_status_date }}</div>
            </div>
            <div class="form-row">
                <div><strong>Responsable: </strong>{{ $entity->invoice_status_responsable }}</div>
            </div>
            <div class="form-row">
                <div><strong>Factura: </strong>{{ $entity->invoice_number }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('invoice_status.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>

@endsection
