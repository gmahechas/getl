@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Promedio Estado Facturas</h2>
            @include('report.search-form-avg')
            <hr />
            @empty($entities)
                <div class="alert alert-warning">
                    There are not rows
                </div>
            @else
            <div class="row">
                <div class="col-5">
                    @include('shared.table', [
                        'columns' => [
                            '1' => [
                                'head' => 'Estado',
                                'field' => 'status_description'
                            ],
                            '2' => [
                                'head' => "Numero de Operaciones",
                                'field' => 'invoice_count_operations'
                            ],
                            '3' => [
                                'head' => 'Numero de facturas tratadas',
                                'field' => 'invoice_count'
                            ],
                            '4' => [
                                'head' => 'Promedio (Dias)',
                                'field' => 'invoice_status_date_diff'
                            ],
                        ]
                    ])
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <td>&nbsp;</td>
                                <td>Valores (Q-J)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total de operaciones en el periodo:</td>
                                <td>{{ $sum_invoice_count_operations }}</td>
                            </tr>
                            <tr>
                                <td>Total de facturas tratadas en el periodo:</td>
                                <td>{{ $sum_invoice_count }}</td>
                            </tr>
                            <tr>
                                <td>Eficiencia del proceso:</td>
                                <td>{{ number_format((($sum_invoice_count / $sum_invoice_count_operations) * 100),2) }}</td>
                            </tr>
                            <tr>
                                <td>Tiempo promedio de tratamiento de las facturas:</td>
                                <td>{{ $sum_invoice_status_date_diff }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Responsable</th>
                                <th>Promedio (dias)</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($secondTable as $key => $entity)
                                <tr>
                                    <td>{{ $entity['newStatus'] }}</td>
                                    <td>{{ number_format($entity['invoice_status_date_diff'], 2) }}</td>
                                    <td>{{ ($key != 4) ? number_format($entity['percent'], 2) : '' }}</td>
                                </tr>
                            @endforeach
                                <tr>
                                    <td colspan="3">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Temps à SC (jours)</td>
                                    <td>{{ $tempsaSC }}</td>
                                    <td>{{ number_format($tempsaSCPercent, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Temps à CAP (jours)</td>
                                    <td>{{ $tempsaCAP }}</td>
                                    <td>{{ number_format($tempsaCAPPercent, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Total Temps à payée (jours)</td>
                                    <td>{{ $totalTemps }}</td>
                                    <td>{{ number_format($totalPercent, 2) }}</td>
                                </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @endempty
        </div>
    </div>
@endsection
