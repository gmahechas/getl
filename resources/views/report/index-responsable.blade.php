@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Informe por Responsable</h2>
            @include('report.search-form-avg')
            <hr />
            <div class="row">
                <div class="col-8">
                    @empty(true)

                    @else
                    <div class="row">
                        <div class="col-6">
                            @include('shared.table', [
                                'columns' => [
                                    '1' => [
                                        'head' => 'Estado',
                                        'field' => 'status_description'
                                    ],
                                    '2' => [
                                        'head' => "Responsable",
                                        'field' => 'invoice_status_responsable'
                                    ],
                                    '3' => [
                                        'head' => 'Cantidad de Facturas',
                                        'field' => 'count_invoice'
                                    ],
                                    '4' => [
                                        'head' => 'Promedio (Tiempo)',
                                        'field' => 'avg_invoice_status_date_diff'
                                    ],
                                ]
                            ])
                        </div>
                    </div>
                    @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
