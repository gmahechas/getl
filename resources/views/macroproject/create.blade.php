@extends('layouts.app')

@section('content')
    <h1>Crear Portafolio</h1>
    <form method="POST" action="{{ route('macroproject.store') }}">
    @csrf
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ old('id_ref') }}">
        </div>
        <div class="form-row">
            <label>Portafolio</label>
            <input type="text" name="macroproject_name" class="form-control" value="{{ old('macroproject_name') }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
        </div>
    </form>
@endsection
