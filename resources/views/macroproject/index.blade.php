@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Macroprojects's List</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('macroproject.create') }}" class="btn btn-success">Create</a>
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
                    'head' => 'Id',
                    'field' => 'id'
                ],
                '2' => [
                    'head' => 'Project',
                    'field' => 'macroproject_name'
                ],
                '3' => [
                    'head' => 'Actions',
                    'field' => '__actions__'
                ]
            ]
        ])
    @endempty
@endsection



