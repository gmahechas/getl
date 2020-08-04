@extends('layouts.app')

@section('content')
    <h1>Editar Proyecto: {{ $entity->project_name }}</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('project.update', ['project' => $entity->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ $entity->id_ref }}">
                </div>
                <div class="form-row">
                    <label>Proyecto</label>
                    <input type="text" name="project_name" class="form-control" value="{{ $entity->project_name }}">
                </div>
                <div class="form-row">
                    <label>Financiamiento</label>
                    <input type="text" name="project_financing" class="form-control" value="{{ $entity->project_financing }}">
                </div>
                <div class="form-row">
                    <label>Portafolio</label>
                    <select name="macroproject_id" class="form-control">
                        @foreach ($macroprojects as $macroproject)
                            <option value="{{ $macroproject->id }}" {{ $macroproject->id === $entity->macroproject_id ? 'selected' : '' }}>{{ $macroproject->macroproject_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('project.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
