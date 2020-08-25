@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Estados Facturas</h2>
            @include('invoice_status.search-form')
            <hr />
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
                                'field' => 'status_description'
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
                                'head' => 'Factura',
                                'field' => 'invoice_id_ref'
                            ],
                            '5' => [
                                'head' => 'Acciones',
                                'field' => '__actions__'
                            ]
                        ]
                    ])
            @endempty
        </div>
    </div>
@endsection



