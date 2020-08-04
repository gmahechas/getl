@extends('layouts.app')

@section('content')
    <h1>Crear Contrato</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('contract.store') }}">
                @csrf
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ old('id_ref') }}">
                </div>
                <div class="form-row">
                    <label>Proveedor</label>
                    <input type="text" name="contract_provider" class="form-control" value="{{ old('contract_provider') }}">
                </div>
                <div class="form-row">
                    <label>Valor Contrato</label>
                    <input type="text" name="contract_budgeted" class="form-control" value="{{ old('contract_budgeted') }}">
                </div>
                <div class="form-row">
                    <label>Actividad</label>
                    <select name="activity_id" class="form-control">
                        @foreach ($activities as $activity)
                            <option value="{{ $activity->id }}">{{ $activity->activity_name }}</option>
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
