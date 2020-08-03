@extends('layouts.app')

@section('content')
    <h1>Editar Portafolio: {{ $entity->macroproject_name }}</h1>
    <form method="POST" action="{{ route('macroproject.update', ['macroproject' => $entity->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ $entity->id_ref }}">
        </div>
        <div class="form-row">
            <label>Portafolio</label>
            <input type="text" name="macroproject_name" class="form-control" value="{{ $entity->macroproject_name }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
        </div>
    </form>
@endsection
