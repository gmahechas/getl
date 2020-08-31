@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Indicadores</h2>
            @include('indicators.search-form')
            <hr />
            <div class="row">
                <div class="col-4">
                    OK
                </div>
            </div>
        </div>
    </div>
@endsection
