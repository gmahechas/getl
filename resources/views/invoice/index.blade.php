@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Facturas</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('invoice.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    @empty($entities)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        @include('shared.table', [
                'model' => 'invoice',
                'columns' => [
                    '1' => [
                        'head' => 'Id Ref',
                        'field' => 'id_ref'
                    ],
                    '2' => [
                        'head' => '#Factura',
                        'field' => 'invoice_number'
                    ],
                    '3' => [
                        'head' => 'Fecha',
                        'field' => 'invoice_date'
                    ],
                    '4' => [
                        'head' => 'Responsable',
                        'field' => 'invoice_responsable'
                    ],
                    '5' => [
                        'head' => 'Total',
                        'field' => 'invoice_total'
                    ],
                    '6' => [
                        'head' => 'Proveedor',
                        'field' => 'contract_provider'
                    ],
                    '7' => [
                        'head' => 'Contrato',
                        'field' => 'contract_id_ref'
                    ],
                    '8' => [
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



