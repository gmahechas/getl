@extends('layouts.app')

@section('content')
    <h1>Editar Contrato: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('contract.update', ['contract' => $entity->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ $entity->id_ref }}">
                </div>
                <div class="form-row">
                    <label>Proveedor</label>
                    <input type="text" name="contract_provider" class="form-control" value="{{ $entity->contract_provider }}">
                </div>
                <div class="form-row">
                    <label>Valor Contrato</label>
                    <input type="text" name="contract_budgeted" class="form-control" value="{{ $entity->contract_budgeted }}">
                </div>
                <div class="form-row">
                    <label>Actividad</label>
                    <select name="activity_id" class="form-control">
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}" {{ $activity->id === $entity->activity_id ? 'selected' : '' }}>{{ $activity->activity_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('contract.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
