<div class="col-12">
    <form>
        <div class="row">
            <div class="col-2">
                <div class="form-row">
                    <label>Année</label>
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
                        <option value="01">Janvier</option>
                        <option value="02">Février</option>
                        <option value="03">Mars</option>
                        <option value="04">Avril</option>
                        <option value="05">Mai</option>
                        <option value="06">Juin</option>
                        <option value="07">Juillet</option>
                        <option value="08">Août</option>
                        <option value="09">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
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
