@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Contratos</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('contract.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    @empty($entities)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        @include('shared.table', [
                'model' => 'contract',
                'columns' => [
                    '1' => [
                        'head' => 'Id Ref',
                        'field' => 'id_ref'
                    ],
                    '2' => [
                        'head' => 'Proveedor',
                        'field' => 'contract_provider'
                    ],
                    '3' => [
                        'head' => 'Valor Contrato',
                        'field' => 'contract_budgeted'
                    ],
                    '4' => [
                        'head' => 'Actividad',
                        'field' => 'activity_name'
                    ],
                    '5' => [
                        'head' => 'Pagado (Facturas)',
                        'field' => 'sum_invoices'
                    ],
                    '6' => [
                        'head' => 'Diferencia',
                        'field' => 'diff_with_sum_invoices'
                    ],
                    '7' => [
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



