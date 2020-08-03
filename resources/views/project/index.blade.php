@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-4">
            <h2>Projects's List</h2>
        </div>
        <div class="col-8">
            <a href="{{ route('project.create') }}" class="btn btn-success">Create</a>
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
                        'head' => 'Id',
                        'field' => ['id']
                    ],
                    '2' => [
                        'head' => 'Project',
                        'field' => ['project_name']
                    ],
                    '3' => [
                        'head' => 'Macroproject',
                        'field' => ['macroproject', 'macroproject_name']
                    ],
                    '4' => [
                        'head' => 'Actions',
                        'field' => ['__actions__']
                    ]
                ]
            ])
    @endempty
@endsection



