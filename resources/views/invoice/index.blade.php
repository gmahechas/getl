@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Facturas</h2>
            @include('invoice.search-form')
            <hr />
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
                                'head' => 'Total',
                                'field' => 'invoice_total'
                            ],
                            '5' => [
                                'head' => 'Id ref Contrato',
                                'field' => 'contract_id_ref'
                            ],
                            '6' => [
                                'head' => 'Proveedor',
                                'field' => 'contract_provider'
                            ],
                            '7' => [
                                'head' => 'Estado Actual',
                                'field' => 'status_description'
                            ],
                            '8' => [
                                'head' => 'Acciones',
                                'field' => '__actions__'
                            ]
                        ]
                    ])
            @endempty
        </div>
    </div>
@endsection



