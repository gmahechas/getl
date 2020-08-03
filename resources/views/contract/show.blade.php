@extends('layouts.app')

@section('content')
    <h1>Contracto: {{ $entity->id_ref }}</h1>
    <div class="form-row">
        <label>Proveedor: </label>
        <div>{{ $entity->contract_provider }}</div>
    </div>
    <div class="form-row">
        <label>Actividad: </label>
        <div>{{ $entity->activity_name }}</div>
    </div>
    <div class="form-row">
        <label>Valor Contrato: </label>
        <div>{{ $entity->contract_budgeted }}</div>
    </div>
@endsection
