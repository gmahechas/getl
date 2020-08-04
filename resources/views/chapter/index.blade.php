@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Lote de Trabajos</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('chapter.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
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
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



