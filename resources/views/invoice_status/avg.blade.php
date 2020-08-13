@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Promedio Estados Facturas</h2>
            @include('invoice_status.search-form-avg')
            <hr />
            @empty($entities)
                <div class="alert alert-warning">
                    There are not rows
                </div>
            @else
            <div class="row">
                <div class="col-4">
                    @include('shared.table', [
                        'model' => '--',
                        'columns' => [
                            '1' => [
                                'head' => 'Estado',
                                'field' => 'invoice_status_status'
                            ],
                            '2' => [
                                'head' => 'Promedio',
                                'field' => 'invoice_status_date_diff'
                            ]
                        ]
                    ])
                </div>
            </div>
            @endempty
        </div>
    </div>
@endsection
