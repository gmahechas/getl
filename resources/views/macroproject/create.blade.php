@extends('layouts.app')

@section('content')
    <h1>Create Macrocroproject</h1>
    <form method="POST" action="{{ route('macroproject.store') }}">
    @csrf
        <div class="form-row">
            <label>Macroproject's name</label>
            <input type="text" name="macroproject_name" class="form-control" value="{{ old('macroproject_name') }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
