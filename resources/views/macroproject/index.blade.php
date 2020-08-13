@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Portafolios</h2>
            <a href="{{ route('macroproject.create') }}" class="btn btn-success">Crear</a>
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
        </div>
    </div>
@endsection



