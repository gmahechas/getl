@extends('layouts.app')

@section('content')
    <h1>Portafolio: {{ $macroproject->macroproject_name }}</h1>
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $macroproject->id_ref }}</div>
    </div>
@endsection
