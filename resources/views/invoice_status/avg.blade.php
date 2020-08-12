@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Promedio Estados Facturas</h2>
        </div>
    </div>
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
@endsection
