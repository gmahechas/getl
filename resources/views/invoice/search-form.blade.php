<div class="col-12">
    <div class="row">
        <div class="col-1">
            <div class="form-row">
                <label>Id Ref</label>
                <input type="text" name="id_ref" class="form-control">
            </div>
        </div>
        <div class="col-1">
            <div class="form-row">
                <label>#Factura</label>
                <input type="text" name="invoice_number" class="form-control">
            </div>
        </div>
        <div class="col-1">
            <div class="form-row">
                <label>Fecha (Inicio)</label>
                <input type="text" name="invoice_date_start" class="form-control">
            </div>
        </div>
        <div class="col-1">
            <div class="form-row">
                <label>Fecha (Final)</label>
                <input type="text" name="invoice_date_end" class="form-control">
            </div>
        </div>
        <div class="col-1">
            <label>&nbsp;</label>
            <button type="submit" class="form-control btn btn-primary">Buscar</button>
        </div>
        <div class="col-1">
            <label>&nbsp;</label>
            <a href="{{ route('invoice.create') }}" class="form-control btn btn-success">Crear</a>
        </div>
    </div>
</div>
