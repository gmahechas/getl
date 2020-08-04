@extends('layouts.app')

@section('content')
    <h1>Crear Lote de Trabajo</h1>
    <div class="row">
        <div class="col-sm-5">
            <form method="POST" action="{{ route('chapter.store') }}">
                @csrf
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ old('id_ref') }}">
                </div>
                <div class="form-row">
                    <label>Lote de Trabajo</label>
                    <input type="text" name="chapter_name" class="form-control" value="{{ old('chapter_name') }}">
                </div>
                <div class="form-row">
                    <label>Presupuesto</label>
                    <input type="text" name="chapter_budgeted" class="form-control" value="{{ old('chapter_budgeted') }}">
                </div>
                <div class="form-row">
                    <label>Proyecto</label>
                    <select name="project_id" class="form-control">
                        @foreach ($projects as $project)
                            <option value="{{ $project->id }}">{{ $project->project_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row mt-3">
                    <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                    <a href="{{ route('chapter.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
                </div>
            </form>
        </div>
    </div>
@endsection
