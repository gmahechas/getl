@extends('layouts.app')

@section('content')
    <h1>Estado de la Factura Id: {{ $entity->invoice_id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Fecha: </strong>{{ $entity->invoice_status_date }}</div>
            </div>
            <div class="form-row">
                <div><strong>Responsable: </strong>{{ $entity->invoice_status_responsable }}</div>
            </div>
            <div class="form-row">
                <div><strong>Factura: </strong>{{ $entity->invoice_id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>Estado: </strong>{{ $entity->status_id }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('invoice_status.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>

@endsection
