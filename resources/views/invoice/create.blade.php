@extends('layouts.app')

@section('content')
    <h1>Crear Factura</h1>
    <form method="POST" action="{{ route('activity.store') }}">
    @csrf
        <div class="form-row">
            <label>Contrato</label>
            <select name="contract_id" class="form-control">
                @foreach ($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->id_ref }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ old('id_ref') }}">
        </div>
        <div class="form-row">
            <label>#Factura</label>
            <input type="text" name="invoice_number" class="form-control" value="{{ old('invoice_number') }}">
        </div>
        <div class="form-row">
            <label>Fecha</label>
            <input type="text" name="invoice_date" class="form-control" value="{{ old('invoice_date') }}">
        </div>
        <div class="form-row">
            <label>Responsable</label>
            <input type="text" name="invoice_responsable" class="form-control" value="{{ old('invoice_responsable') }}">
        </div>
        <div class="form-row">
            <label>Total</label>
            <input type="text" name="invoice_total" class="form-control" value="{{ old('invoice_total') }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
        </div>
    </form>
@endsection
