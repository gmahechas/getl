@extends('layouts.app')

@section('content')
    <h1>Portafolio: {{ $entity->macroproject_name }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $entity->id_ref }}</div>
    </div>
@endsection
