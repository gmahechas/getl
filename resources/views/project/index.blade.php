@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Proyectos</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('project.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    @empty($entities)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        @include('shared.table', [
                'model' => 'project',
                'columns' => [
                    '1' => [
                        'head' => 'Id Ref',
                        'field' => 'id_ref'
                    ],
                    '2' => [
                        'head' => 'Proyecto',
                        'field' => 'project_name'
                    ],
                    '3' => [
                        'head' => 'Financiamiento',
                        'field' => 'project_financing'
                    ],
                    '4' => [
                        'head' => 'Portafolio',
                        'field' => 'macroproject_name'
                    ],
                    '5' => [
                        'head' => 'Acciones',
                        'field' => '__actions__'
                    ]
                ]
            ])
    @endempty
@endsection



