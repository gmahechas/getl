@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Lote de Trabajos</h2>
            <a href="{{ route('chapter.create') }}" class="btn btn-success">Crear</a>
            @empty($entities)
                <div class="alert alert-warning">
                    There are not product
                </div>
            @else
                @include('shared.table', [
                        'model' => 'chapter',
                        'columns' => [
                            '1' => [
                                'head' => 'Id Ref',
                                'field' => 'id_ref'
                            ],
                            '2' => [
                                'head' => 'Descripcion Lote Trabajo',
                                'field' => 'chapter_name'
                            ],
                            '3' => [
                                'head' => 'Presupuesto',
                                'field' => 'chapter_budgeted'
                            ],
                            '4' => [
                                'head' => 'Proyecto',
                                'field' => 'project_name'
                            ],
                            '5' => [
                                'head' => 'Ppto Actividades',
                                'field' => 'sum_activity_budgeted'
                            ],
                            '6' => [
                                'head' => 'Contratado',
                                'field' => 'sum_activity_contracts_budgeted'
                            ],
                            '7' => [
                                'head' => 'Pagao',
                                'field' => 'sum_activity_contracts_invoices'
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
