@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Indicateurs par mois</h2>
            @include('indicators.search-form-months-french')
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
                                    <td>Nb des factures reçues dans la periode (Q):</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Nb de factures payées dans la periode (Q):</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Nb de factures payées > 30 jours dans la periode (Q):</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Nb de factures payées <= 30 jours dans la periode (Q):</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>% des factures payées dans la periode par rapport aux TFRP:</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>% des factures payées > 30 jours par rapport au TFRP:</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>% des factures payées <= 30 jours par rapport au TFRP:</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>% Total des factures payées dans la periode > 30 jours par rapport au NFPP:</td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td>% des factures payées dans la periode <= 30 jours par rapport au NFPP:</td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Temps moyen de traitement des factures reçues dans la periode:</td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td>Temps moyen de traitement des factures payées dans la periode:</td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td>Temps moyen de traitement des factures > 30 jours payées pendant la periode:</td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td>Temps moyen de traitement des factures <= à 30 jours payées dans la periode:</td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Temps moyen de traitement des factures reçues dans la periode:</td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td>Temps moyen de traitement des factures > à 30 jours payées dans la periode:</td>

                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td>Temps moyen de traitement des factures < = à 30 jours payées dans la periode:</td>
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
                                    <th>Moyenne</th>
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
