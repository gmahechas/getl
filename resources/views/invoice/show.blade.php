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
                <div><strong>Responsable: </strong>{{ $entity->invoice_responsable }}</div>
            </div>
            <div class="form-row">
                <div><strong>Total: </strong>{{ $entity->invoice_total }}</div>
            </div>
        </div>
    </div>

@endsection
