@extends('layouts.app')

@section('content')
    <h1>Editar Estado a una Factura: Id ref: {{ $entity->invoice_id_ref }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('invoice_status.update', ['invoice_status' => $entity->id]) }}">
                @csrf
                @method('PUT')
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
                    <select name="invoice_id_ref" class="form-control">
                        @foreach ($invoices as $invoice)
                            <option value="{{ $invoice->id_ref }}" {{ $invoice->id === $currentInvoice[0]->id ? 'selected' : '' }}>{{ 'Id Ref: ' . $invoice->id_ref .' - #Factura: '. $invoice->invoice_number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row">
                    <label>Estado</label>
                    <select name="status_id" class="form-control">
                        @foreach ($status as $sts)
                            <option value="{{ $sts->id }}" {{ ($entity->status_id == $sts->id) ? 'selected' : '' }}>{{ $sts->status_description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('invoice_status.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
