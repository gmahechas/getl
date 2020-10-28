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
                @foreach ($result as $month_result)
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
            </div>
        </div>
    </div>
@endsection
