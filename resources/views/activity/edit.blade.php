@extends('layouts.app')

@section('content')
    <h1>Editar Actividad: {{ $entity->activity_name }}</h1>
    <form method="POST" action="{{ route('activity.update', ['activity' => $entity->id]) }}">
    @csrf
    @method('PUT')
        <div class="form-row">
            <label>Lote de Trabajo</label>
            <select name="chapter_id" class="form-control">
                @foreach ($chapters as $chapter)
                    <option value="{{ $chapter->id }}" {{ $chapter->id === $entity->chapter_id ? 'selected' : '' }}>{{ $chapter->chapter_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label>Id Ref</label>
            <input type="text" name="id_ref" class="form-control" value="{{ $entity->id_ref }}">
        </div>
        <div class="form-row">
            <label>Actividad</label>
            <input type="text" name="activity_name" class="form-control" value="{{ $entity->activity_name }}">
        </div>
        <div class="form-row">
            <label>Financiamiento</label>
            <input type="text" name="activity_budgeted" class="form-control" value="{{ $entity->activity_budgeted }}">
        </div>
        <div class="form-row mt-3">
            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
        </div>
    </form>
@endsection
