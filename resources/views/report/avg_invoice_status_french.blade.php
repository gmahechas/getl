@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Traitement des factures par statut</h2>
            @include('report.search-form-avg-french')
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
                                'head' => 'Statut',
                                'field' => 'status_description'
                            ],
                            '2' => [
                                'head' => "Nombre d'opérations",
                                'field' => 'invoice_count_operations'
                            ],
                            '3' => [
                                'head' => 'Nombre des factures traites',
                                'field' => 'invoice_count'
                            ],
                            '4' => [
                                'head' => 'Moyenne (jours)',
                                'field' => 'invoice_status_date_diff'
                            ],
                        ]
                    ])
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <td>&nbsp;</td>
                                <td>Valeurs (Q-J)</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total des opérations dans la période:</td>
                                <td>{{ $sum_invoice_count_operations }}</td>
                            </tr>
                            <tr>
                                <td>Total des factures traitées dans la période:</td>
                                <td>{{ $sum_invoice_count }}</td>
                            </tr>
                            <tr>
                                <td>Efficacité du processus:</td>
                                <td>{{ number_format((($sum_invoice_count / $sum_invoice_count_operations) * 100),2) }}</td>
                            </tr>
                            <tr>
                                <td>Délai moyen de traitement des factures:</td>
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
                                <th>Moyenne (jours)</th>
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
