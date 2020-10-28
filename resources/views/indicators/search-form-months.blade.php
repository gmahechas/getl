<div class="col-12">
    <form>
        <div class="row">
            <div class="col-2">
                <div class="form-row">
                    <label>Año</label>
                    <select name="year" id="year" class="form-control">
  {{--                       <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option> --}}
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <div class="form-row">
                    <label>Meses&nbsp;</label>
                    <select name="months[]" id="months[]" class="form-control" size="12" multiple>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
            </div>
            <div class="col-1">
                <label>&nbsp;</label>
                <button type="submit" class="form-control btn btn-primary">Buscar</button>
            </div>
        </div>
    </form>
</div>
