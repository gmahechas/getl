@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Indicadores</h2>
            @include('indicators.search-form')
            <hr />
            <div class="row">
                <div class="col-8">
                    @empty($indicator_1)

                    @else
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Indicador</th>
                                    <th>Facturas</th>
                                    <th>% Dias</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Total de las facturas recibidas en el periodo:</td>
                                    <td>{{ $indicator_1['result'][0]->count_invoices }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Total de las facturas pagadas en el periodo:</td>
                                    <td>{{ $indicator_2['result'][0]->count_invoices }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Total de las facturas pagadas en el periodo > a 30 dias:</td>
                                    <td>{{ $indicator_3['result'][0]->count_invoices }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Total de facturas pagadas en el periodo < = 30 dias:</td>
                                    <td>{{ $indicator_4['result'][0]->count_invoices }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>% Total de las facturas pagadas con respecto a las facturas recibidas en el mismo periodo:</td>
                                    <td>{{ number_format($indicator_2['result'][0]->count_invoices / $indicator_1['result'][0]->count_invoices, 2) }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>% de facturas pagadas > 30 dias con respecto al total de facturas recibidas en el mismo periodo:</td>
                                    <td>{{ number_format($indicator_3['result'][0]->count_invoices / $indicator_1['result'][0]->count_invoices, 2) }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>% de facturas pagadas < = 30 dias con respecto al total de facturas recibidas en el mismo periodo:</td>
                                    <td>{{ number_format($indicator_4['result'][0]->count_invoices / $indicator_1['result'][0]->count_invoices, 2) }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>% de facturas pagadas > 30 dias con respecto al total de facturas pagadas del mismo periodo:</td>
                                    <td>{{ number_format($indicator_3['result'][0]->count_invoices / $indicator_2['result'][0]->count_invoices, 2) }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>% de facturas pagadas <= 30 dias con respecto al total de facturas pagadas del mismo periodo:</td>
                                    <td>{{ number_format($indicator_4['result'][0]->count_invoices / $indicator_2['result'][0]->count_invoices, 2) }}</td>
                                    <td>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Tiempo promedio de tramite de las facturas recibidas en el periodo:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_1['result'][0]->avg_duration,2) }}</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_2['result'][0]->avg_duration,2) }}</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo > a 30 dias:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_3['result'][0]->avg_duration,2) }}</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo < = 30 dias:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_4['result'][0]->avg_duration,2) }}</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Tiempo promedio de tratamiento de las facturas recibidas en el periodo:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_1['result'][0]->count_invoices / $indicator_1['result'][0]->avg_duration,2) }}</td>
                                </tr>
{{--                                 <tr>
                                    <td>15</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo > a 30 dias:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_3['result'][0]->count_invoices / $indicator_1['result'][0]->avg_duration,2) }}</td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo <= a 30 dias:</td>
                                    <td>&nbsp;</td>
                                    <td>{{ number_format($indicator_4['result'][0]->count_invoices / $indicator_1['result'][0]->avg_duration,2) }}</td>
                                </tr> --}}
                            </tbody>
                        </table>
                    @endempty
                </div>
            </div>
        </div>
    </div>
@endsection
