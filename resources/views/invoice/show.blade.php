@extends('layouts.app')

@section('content')
    <h1>Factura: {{ $entity->id_ref }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $entity->id_ref }}</div>
    </div>
    <div class="form-row">
        <label>#Factura: </label>
        <div>{{ $entity->invoice_number }}</div>
    </div>
    <div class="form-row">
        <label>Fecha: </label>
        <div>{{ $entity->invoice_date }}</div>
    </div>
    <div class="form-row">
        <label>Responsable: </label>
        <div>{{ $entity->invoice_responsable }}</div>
    </div>
    <div class="form-row">
        <label>Total: </label>
        <div>{{ $entity->invoice_total }}</div>
    </div>
@endsection
