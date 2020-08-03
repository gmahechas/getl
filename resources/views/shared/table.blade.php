<table class="table table-sm table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            @foreach ($columns as $column)
                <th>{{ $column['head'] }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($entities as $entity)
            <tr>
                @foreach ($columns as $column)
                    {{-- the field are not actions --}}
                    @if ($column['field'] !== '__actions__')
                        <td>{{ $entity->{$column['field']} }}</td>
                    @else
                        {{-- the field are actions --}}
                        <td>
                            <a href="{{ route("$model.show", ["$model" => $entity->id]) }}" class="btn btn-sm btn-primary">Show</a>
                            <a href="{{ route("$model.edit", ["$model" => $entity->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form method="POST" class="d-inline" action="{{ route("$model.destroy", ["$model" => $entity->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-primary">Delete</button>
                            </form>
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
