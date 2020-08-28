@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Promedio Estados Facturas</h2>
            @include('report.search-form-avg')
            <hr />
            @empty($entities)
                <div class="alert alert-warning">
                    There are not rows
                </div>
            @else
            <div class="row">
                <div class="col-4">
                    @include('shared.table', [
                        'columns' => [
                            '1' => [
                                'head' => 'Estado',
                                'field' => 'status_description'
                            ],
                            '2' => [
                                'head' => 'Promedio',
                                'field' => 'invoice_status_date_diff'
                            ],
                            '3' => [
                                'head' => 'Cantidad Facturas',
                                'field' => 'invoice_count'
                            ],
                            '4' => [
                                'head' => 'Cantidad Operaciones',
                                'field' => 'invoice_count_operations'
                            ]
                        ]
                    ])
                    <div class="alert alert-primary" role="alert">
                        Sumatoria de promedio de dias: {{ $sum_invoice_status_date_diff }} (Dias)
                    </div>
                </div>
                <div class="col-4">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Responsable</th>
                                <th>Promedio</th>
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
