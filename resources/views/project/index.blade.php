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
    @empty($projects)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Project</th>
                        <th>Actions</th>
                    </tr>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <td>{{ $project->id }}</td>
                                <td>{{ $project->project_name }}</td>
                                <td>
                                    <a href="{{ route('project.show', ['project' => $project->id]) }}" class="btn btn-sm btn-primary">Show</a>
                                    <a href="{{ route('project.edit', ['project' => $project->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" class="d-inline" action="{{ route('project.destroy', ['project' => $project->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </thead>
            </table>
        </div>
    @endempty
@endsection



