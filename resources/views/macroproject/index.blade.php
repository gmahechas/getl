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
    @empty($macroprojects)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Macroproject</th>
                        <th>Actions</th>
                    </tr>
                    <tbody>
                        @foreach ($macroprojects as $macroproject)
                            <tr>
                                <td>{{ $macroproject->id }}</td>
                                <td>{{ $macroproject->macroproject_name }}</td>
                                <td>
                                    <a href="{{ route('macroproject.show', ['macroproject' => $macroproject->id]) }}" class="btn btn-sm btn-primary">Show</a>
                                    <a href="{{ route('macroproject.edit', ['macroproject' => $macroproject->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form method="POST" class="d-inline" action="{{ route('macroproject.destroy', ['macroproject' => $macroproject->id]) }}">
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



