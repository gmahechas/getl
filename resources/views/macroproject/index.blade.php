@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Portafolios</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('macroproject.create') }}" class="btn btn-success">Crear</a>
        </div>
    </div>
    @empty($entities)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        @include('shared.table', [
            'model' => 'macroproject',
            'columns' => [
                '1' => [
                    'head' => 'Id Ref',
                    'field' => 'id_ref'
                ],
                '2' => [
                    'head' => 'Portafolio',
                    'field' => 'macroproject_name'
                ],
                '3' => [
                    'head' => 'Acciones',
                    'field' => '__actions__'
                ]
            ]
        ])
    @endempty
@endsection



