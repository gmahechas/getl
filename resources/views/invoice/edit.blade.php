@extends('layouts.app')

@section('content')
    <h1>Editar Factura: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('invoice.update', ['invoice' => $entity->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ $entity->id_ref }}">
                </div>
                <div class="form-row">
                    <label>#Factura</label>
                    <input type="text" name="invoice_number" class="form-control" value="{{ $entity->invoice_number }}">
                </div>
                <div class="form-row">
                    <label>Fecha</label>
                    <input type="text" name="invoice_date" class="form-control" value="{{ $entity->invoice_date }}">
                </div>
                <div class="form-row">
                    <label>Total</label>
                    <input type="text" name="invoice_total" class="form-control" value="{{ $entity->invoice_total }}">
                </div>
                <div class="form-row">
                    <label>Contrato</label>
                    <select name="contract_id" class="form-control">
                        @foreach ($contracts as $contract)
                            <option value="{{ $contract->id }}" {{ $contract->id === $entity->contract_id ? 'selected' : '' }}>{{ $contract->id_ref }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('invoice.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
