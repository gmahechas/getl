@extends('layouts.app')

@section('content')
    <h1>Factura: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-3">
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
                <div><strong>Total: </strong>{{ number_format($entity->invoice_total, 2) }}</div>
            </div>
            <div class="form-row">
                <div><strong>Proveedor: </strong>{{ $entity->contract_provider }}</div>
            </div>
            <div class="form-row">
                <div><strong>Contrato: </strong>{{ $entity->contract_id_ref }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('invoice.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>
        <div class="col-sm-5">
            <h3>Estados</h3>
            @include('shared.table', [
                'model' => 'invoice_status',
                'columns' => [
                    '1' => [
                        'head' => 'Estado',
                        'field' => 'status_description'
                    ],
                    '2' => [
                        'head' => 'Fecha Inicio',
                        'field' => 'invoice_status_date'
                    ],
                    '3' => [
                        'head' => 'Fecha Final',
                        'field' => 'invoice_status_date_end'
                    ],
                    '4' => [
                        'head' => 'Dias en el Estado',
                        'field' => 'invoice_status_date_diff'
                    ],
                    '5' => [
                        'head' => 'Responsable',
                        'field' => 'invoice_status_responsable'
                    ]
                ]
            ])
        </div>
        <div class="col-3">
            <div class="alert alert-primary" role="alert">
                Sumatoria de promedio de dias: {{ $sum_invoice_status_date_diff }} (Dias)
            </div>
        </div>
    </div>

@endsection
