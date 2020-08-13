@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Actividades</h2>
            <a href="{{ route('activity.create') }}" class="btn btn-success">Crear</a>
            @empty($entities)
                <div class="alert alert-warning">
                    There are not product
                </div>
            @else
                @include('shared.table', [
                        'model' => 'activity',
                        'columns' => [
                            '1' => [
                                'head' => 'Id Ref',
                                'field' => 'id_ref'
                            ],
                            '2' => [
                                'head' => 'Actividad',
                                'field' => 'activity_name'
                            ],
                            '3' => [
                                'head' => 'Presupuesto Actividad',
                                'field' => 'activity_budgeted'
                            ],
                            '4' => [
                                'head' => 'Lote de Trabajo',
                                'field' => 'chapter_name'
                            ],
                            '5' => [
                                'head' => 'Contratado',
                                'field' => 'sum_contracts_budgeted'
                            ],
                            '6' => [
                                'head' => 'Contratado Pagado',
                                'field' => 'sum_contracts_invoices'
                            ],
                            '7' => [
                                'head' => 'Acciones',
                                'field' => '__actions__'
                            ]
                        ]
                    ])
            @endempty
        </div>
    </div>
@endsection



