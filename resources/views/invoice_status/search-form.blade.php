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
                <label>&nbsp;</label>
                <button type="submit" class="form-control btn btn-primary">Buscar</button>
            </div>
            <div class="col-1">
                <label>&nbsp;</label>
                <a href="{{ route('invoice_status.create') }}" class="form-control btn btn-success">Crear</a>
            </div>
        </div>
    </form>
</div>
