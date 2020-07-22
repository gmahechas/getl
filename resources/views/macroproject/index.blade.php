@extends('layout.index')

@section('content')
    <h1>Macroprojects's List</h1>

    <a href="{{ route('macroproject.create') }}" class="btn btn-success">Create</a>

    @empty($macroprojects)
        <div class="alert alert-warning">
            There are not product
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
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
                                    <a href="{{ route('macroproject.show', ['macroproject' => $macroproject->id]) }}" class="btn btn-link">Show</a>
                                    <a href="{{ route('macroproject.edit', ['macroproject' => $macroproject->id]) }}" class="btn btn-link">Edit</a>
                                    <form method="POST" action="{{ route('macroproject.destroy', ['macroproject' => $macroproject->id]) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link">Delete</button>
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



