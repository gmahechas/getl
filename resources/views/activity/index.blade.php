@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Actividades</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('activity.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
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
                        'head' => 'Presupuesto',
                        'field' => 'activity_budgeted'
                    ],
                    '4' => [
                        'head' => 'Lote de Trabajo',
                        'field' => 'chapter_name'
                    ],
                    '5' => [
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



