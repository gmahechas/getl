@extends('layouts.app')

@section('content')
    <h1>Editar Portafolio: {{ $entity->macroproject_name }}</h1>
    <div class="row">
        <div class="col-sm-5">
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
                    <a href="{{ route('macroproject.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
