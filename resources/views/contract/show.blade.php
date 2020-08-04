@extends('layouts.app')

@section('content')
    <h1>Contracto: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>Proveedor: </strong>{{ $entity->contract_provider }}</div>
            </div>
            <div class="form-row">
                <div><strong>Valor Contrato: </strong>{{ $entity->contract_budgeted }}</div>
            </div>
            <div class="form-row">
                <div><strong>Actividad: </strong>{{ $entity->activity_name }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('contract.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
    </div>
@endsection
