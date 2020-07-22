@extends('layout.index')

@section('content')
    <h1>Edit Macrocroproject</h1>
    <form method="POST" action="{{ route('macroproject.update', ['macroproject' => $macroproject->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Macroproject's name</label>
            <input type="text" name="macroproject_name" class="form-control" value="{{ $macroproject->macroproject_name }}">
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Save</button>
        </div>
    </form>
@endsection
