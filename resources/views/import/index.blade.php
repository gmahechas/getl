@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>IMPORTAR</h2>
            <hr />
            <div class="row">
                <div class="col-3">
                    <form method="POST" action="{{ route('import.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <label>Que importar? :</label>
                            <select name="import_type" class="form-control">
                                <option value="invoice">Facturas</option>
                                <option value="invoice_status">Estados Facturas</option>
                                <option value="invoice_payee">Estados Payee Facturas</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label>Archivo</label>
                            <input type="file" name="file" class="form-control-file">
                        </div>
                        <div class="form-row mt-3">
                            <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
