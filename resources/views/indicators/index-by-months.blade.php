@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Indicadores por Meses</h2>
            @include('indicators.search-form-months')
            <hr />
            <div class="row no-gutters">
                <div class="col-5">
                    @empty($result)

                    @else
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Indicador</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Total de las facturas recibidas en el periodo:</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Total de las facturas pagadas en el periodo:</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Total de las facturas pagadas en el periodo > a 30 dias:</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Total de facturas pagadas en el periodo < = 30 dias:</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>% Total de las facturas pagadas con respecto a las facturas recibidas en el mismo periodo:</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>% de facturas pagadas > 30 dias con respecto al total de facturas recibidas en el mismo periodo:</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>% de facturas pagadas < = 30 dias con respecto al total de facturas recibidas en el mismo periodo:</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>% de facturas pagadas > 30 dias con respecto al total de facturas pagadas del mismo periodo:</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>% de facturas pagadas <= 30 dias con respecto al total de facturas pagadas del mismo periodo:</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Tiempo promedio de tramite de las facturas recibidas en el periodo:</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo:</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo > a 30 dias:</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo < = 30 dias:</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Tiempo promedio de tratamiento de las facturas recibidas en el periodo:</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo > a 30 dias:</td>

                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Tiempo promedio de tramite de las facturas pagadas en el periodo <= a 30 dias:</td>
                                </tr>
                            </tbody>
                        </table>
                    @endempty
                </div>
                @empty($result)

                @else
                    @php
                        $sum1 = 0;
                        $sum2 = 0;
                        $sum3 = 0;
                        $sum4 = 0;
                        $sum5 = 0;
                        $sum6 = 0;
                        $sum7 = 0;
                        $sum8 = 0;
                        $sum9 = 0;
                        $sum10 = 0;
                        $sum11 = 0;
                        $sum12 = 0;
                        $sum13 = 0;
                        $sum14 = 0;
                        $sum15 = 0;
                        $sum16 = 0;
                    @endphp
                    @foreach ($result as $month_result)
                        @php
                            $sum1 += $month_result['indicator_1']['result'][0]->count_invoices;
                            $sum2 += $month_result['indicator_2']['result'][0]->count_invoices;
                            $sum3 += $month_result['indicator_3']['result'][0]->count_invoices;
                            $sum4 += $month_result['indicator_4']['result'][0]->count_invoices;
                            $sum5 += number_format($month_result['indicator_2']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2);
                            $sum6 += number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2);
                            $sum7 += number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2);
                            $sum8 += number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_2']['result'][0]->count_invoices, 2);
                            $sum9 += number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_2']['result'][0]->count_invoices, 2);;
                            $sum10 += number_format($month_result['indicator_1']['result'][0]->avg_duration,2);
                            $sum11 += number_format($month_result['indicator_2']['result'][0]->avg_duration,2);
                            $sum12 += number_format($month_result['indicator_3']['result'][0]->avg_duration,2);
                            $sum13 += number_format($month_result['indicator_4']['result'][0]->avg_duration,2);
                            $sum14 += number_format($month_result['indicator_1']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2);
                            $sum15 += number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2);
                            $sum16 += number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2);
                        @endphp
                        <div class="col-1">
                            <table class="table table-sm table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>{{ $month_result['month_name'] }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $month_result['indicator_1']['result'][0]->count_invoices }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $month_result['indicator_2']['result'][0]->count_invoices }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $month_result['indicator_3']['result'][0]->count_invoices }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ $month_result['indicator_4']['result'][0]->count_invoices }}</td>
                                    </tr>
                                    {{-- aca --}}
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_2']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->count_invoices, 2) }}</td>
                                    </tr>

                                    <tr>
                                        <td>{{ number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_2']['result'][0]->count_invoices, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_2']['result'][0]->count_invoices, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_1']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_2']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_3']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_4']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_1']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_3']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ number_format($month_result['indicator_4']['result'][0]->count_invoices / $month_result['indicator_1']['result'][0]->avg_duration,2) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    <div class="col-1">
                        <table class="table table-sm table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Promedio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! number_format($sum1 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum2 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum3 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum4 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum5 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum6 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum7 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum8 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum9 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum10 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum11 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum12 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum13 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum14 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum15 / $num_of_months, 2) !!}</td>
                                </tr>
                                <tr>
                                    <td>{!! number_format($sum16 / $num_of_months, 2) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endempty
            </div>
        </div>
    </div>
@endsection
