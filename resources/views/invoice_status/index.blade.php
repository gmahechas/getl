@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Estados Facturas</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('invoice_status.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    @empty($entities)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        @include('shared.table', [
                'model' => 'invoice_status',
                'columns' => [
                    '1' => [
                        'head' => 'Estado',
                        'field' => 'invoice_status_status'
                    ],
                    '2' => [
                        'head' => 'Fecha',
                        'field' => 'invoice_status_date'
                    ],
                    '3' => [
                        'head' => 'Responsable',
                        'field' => 'invoice_status_responsable'
                    ],
                    '4' => [
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



