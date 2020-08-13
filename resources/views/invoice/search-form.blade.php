<div class="col-12">
    <form>
        <div class="row">
            <div class="col-1">
                <div class="form-row">
                    <label>Id Ref</label>
                    <input type="text" name="id_ref" class="form-control" value="{{ (isset($data['id_ref'])) ? $data['id_ref'] : '' }}">
                </div>
            </div>
            <div class="col-1">
                <div class="form-row">
                    <label>#Factura</label>
                    <input type="text" name="invoice_number" class="form-control" value="{{ (isset($data['invoice_number'])) ? $data['invoice_number'] : '' }}">
                </div>
            </div>
            <div class="col-1">
                <div class="form-row">
                    <label>Fecha (Inicio)</label>
                    <input type="text" name="invoice_date_start" class="form-control" value="{{ (isset($data['invoice_date_start'])) ? $data['invoice_date_start'] : '' }}">
                </div>
            </div>
            <div class="col-1">
                <div class="form-row">
                    <label>Fecha (Final)</label>
                    <input type="text" name="invoice_date_end" class="form-control" value="{{ (isset($data['invoice_date_end'])) ? $data['invoice_date_end'] : '' }}">
                </div>
            </div>
            <div class="col-1">
                <div class="form-row">
                    <label>Estado</label>
                    <input type="text" name="invoice_status_status" class="form-control" value="{{ (isset($data['invoice_status_status'])) ? $data['invoice_status_status'] : '' }}">
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
    </form>
</div>
