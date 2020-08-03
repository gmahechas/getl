@extends('layouts.app')

@section('content')
    <h1>Edit Macrocroproject</h1>
    <form method="POST" action="{{ route('macroproject.update', ['macroproject' => $macroproject->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ $macroproject->id_ref }}">
        </div>
        <div class="form-row">
            <label>Portafolio</label>
            <input type="text" name="macroproject_name" class="form-control" value="{{ $macroproject->macroproject_name }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
    </form>
@endsection
