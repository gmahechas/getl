@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Promedio de facturas Envoyée CAP</h2>
            @include('report.search-form-avg')
            <hr />
            @empty($entities)
                <div class="alert alert-warning">
                    There are not rows
                </div>
            @else
                <div class="row">
                    <div class="col-5">
                        @include('shared.table', [
                            'columns' => [
                                '1' => [
                                    'head' => 'Estado',
                                    'field' => 'status_description'
                                ],
                                '2' => [
                                    'head' => 'Promedio (Dias)',
                                    'field' => 'invoice_status_date_diff'
                                ],
                            ]
                        ])
                        <br />
                        <h3>Total de facturas: {{ $total }}</h3>
                    </div>
                    <div class="col-5">
                        <h3>Total temps traitement a SC: {{ $total_traitement }}</h3>
                    </div>
                </div>
            @endempty
        </div>
    </div>
@endsection