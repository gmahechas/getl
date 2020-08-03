@extends('layouts.app')

@section('content')
    <div class="form-row">
        <label>Id Ref: </label>
        <div>{{ $macroproject->id_ref }}</div>
    </div>
    <div class="form-row">
        <label>Portafolio: </label>
        <div>{{ $macroproject->macroproject_name }}</div>
    </div>
@endsection
