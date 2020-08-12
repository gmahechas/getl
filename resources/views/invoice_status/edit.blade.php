@extends('layouts.app')

@section('content')
    <h1>Editar Id: {{ $entity->id }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('invoice_status.update', ['invoice_status' => $entity->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <label>Estado</label>
                    <input type="text" name="invoice_status_status" class="form-control" value="{{ $entity->invoice_status_status }}">
                </div>
                <div class="form-row">
                    <label>Fecha</label>
                    <input type="text" name="invoice_status_date" class="form-control" value="{{ $entity->invoice_status_date }}">
                </div>
                <div class="form-row">
                    <label>Responsable</label>
                    <input type="text" name="invoice_status_responsable" class="form-control" value="{{ $entity->invoice_status_responsable }}">
                </div>
                <div class="form-row">
                    <label>Factura</label>
                    <input type="text" name="invoice_id" class="form-control" value="{{ $entity->invoice_id }}">
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('invoice_status.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
