@extends('layouts.app')

@section('content')
    <h1>Factura: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>#Factura: </strong>{{ $entity->invoice_number }}</div>
            </div>
            <div class="form-row">
                <div><strong>Fecha: </strong>{{ $entity->invoice_date }}</div>
            </div>
            <div class="form-row">
                <div><strong>Total: </strong>{{ number_format($entity->invoice_total, 2) }}</div>
            </div>
            <div class="form-row">
                <div><strong>Proveedor: </strong>{{ $entity->contract_provider }}</div>
            </div>
            <div class="form-row">
                <div><strong>Contrato: </strong>{{ $entity->contract_id_ref }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('invoice.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>

@endsection
