<div class="col-12">
    <form>
        <div class="row">
            <div class="col-2">
                <div class="form-row">
                    <label>Fecha de Inicio</label>
                    <input type="datetime-local" name="invoice_status_date_start" class="form-control" value="{{ (isset($data['invoice_status_date_start'])) ? $data['invoice_status_date_start'] : '' }}">
                </div>
            </div>
            <div class="col-2">
                <div class="form-row">
                    <label>Fecha de Fin</label>
                    <input type="datetime-local" name="invoice_status_date_end" class="form-control" value="{{ (isset($data['invoice_status_date_end'])) ? $data['invoice_status_date_end'] : '' }}">
                </div>
            </div>
            <div class="col-1">
                <label>&nbsp;</label>
                <button type="submit" class="form-control btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
</div>
