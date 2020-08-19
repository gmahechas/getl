@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Numero Facturas por Estado</h2>
            @empty($entities)
                <div class="alert alert-warning">
                    There are not rows
                </div>
            @else
            <div class="row">
                <div class="col-4">
                    @include('shared.table', [
                        'columns' => [
                            '1' => [
                                'head' => 'Estado',
                                'field' => 'status_description'
                            ],
                            '2' => [
                                'head' => 'Numero de Facturas',
                                'field' => 'count_status_id'
                            ]
                        ]
                    ])
                </div>
            </div>
            @endempty
        </div>
    </div>
@endsection
