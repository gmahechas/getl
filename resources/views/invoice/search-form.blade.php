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
                    <select name="status_id" class="form-control">
                        @foreach ($status as $sts)
                            <option value="{{ $sts['id'] }}" {{
                                (isset($data['status_id'])) ? ($data['status_id'] == $sts['id']) ? 'selected' : '' : ''
                            }}>{{ $sts['status_description'] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-row">
                  <label>Actualizacion Estado Payee</label>
                    <select name="payee_status" class="form-control"> 
                      <option value="" {{ (isset($data['payee_status'])) ? ($data['payee_status'] === '') ? 'selected' : '' : '' }}>-----</option>
                      <option value="yes" {{ (isset($data['payee_status'])) ? ($data['payee_status'] === 'yes') ? 'selected' : '' : '' }}>Facturas con estado Payee Actualizado</option>
                      <option value="no"  {{ (isset($data['payee_status'])) ? ($data['payee_status'] === 'no') ? 'selected' : '' : '' }}>Facturas con estado Payee NO Actualizado</option>
                    </select>
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
