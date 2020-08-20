@extends('layouts.app')

@section('content')
    <h1>Factura: {{ $entity->id_ref }}</h1>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-row">
                <div><strong>Id Ref: </strong>{{ $entity->id_ref }}</div>
            </div>
            <div class="form-row">
                <div><strong>#Factura: </strong>{{ $entity->invoice_number }}</div>
            </div>
            <div class="form-row">
                <div><strong>Fecha: </strong>{{ $entity->invoice_date }}</div>
            </div>
            <div class="form-row">
                <div><strong>Total: </strong>{{ number_format($entity->invoice_total, 2) }}</div>
            </div>
            <div class="form-row">
                <div><strong>Proveedor: </strong>{{ $entity->contract_provider }}</div>
            </div>
            <div class="form-row">
                <div><strong>Contrato: </strong>{{ $entity->contract_id_ref }}</div>
            </div>
            <div class="form-row mt-3">
                <a href="{{ route('invoice.index') }}" class="btn btn-secondary btn-sm">Regresar</a>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-8">
                    <h3>Estados</h3>
                    @include('shared.table', [
                        'model' => 'invoice_status',
                        'columns' => [
                            '1' => [
                                'head' => 'Estado',
                                'field' => 'status_description'
                            ],
                            '2' => [
                                'head' => 'Fecha Inicio',
                                'field' => 'invoice_status_date'
                            ],
                            '3' => [
                                'head' => 'Fecha Final',
                                'field' => 'invoice_status_date_end'
                            ],
                            '4' => [
                                'head' => 'Dias en el Estado',
                                'field' => 'invoice_status_date_diff'
                            ],
                            '5' => [
                                'head' => 'Responsable',
                                'field' => 'invoice_status_responsable'
                            ]
                        ]
                    ])
                </div>
                <div class="col-4">
                    <div class="alert alert-primary" role="alert">
                        Sumatoria (aproximada) de promedio de dias: {{ $sum_invoice_status_date_diff }} (Dias)
                    </div>
                </div>
                <div class="col-sm-8">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Responsable</th>
                                <th>Initial</th>
                                <th>Final</th>
                                <th>Duracion</th>
                                <th>%</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($secondTableWithPercent as $entity)
                                <tr>
                                    <td>{{ $entity['newStatus'] }}</td>
                                    <td>{{ $entity['invoice_status_date'] }}</td>
                                    <td>{{ $entity['invoice_status_date_end'] }}</td>
                                    <td>{{ $entity['invoice_status_date_diff'] }}</td>
                                    <td>{{ ($entity['status_id'] != 6) ? number_format($entity['percent'], 2) : '' }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td>&nbsp;</td>
                                <td>Temps à SC (jours)</td>
                                <td>{{ $tempsaSC }}</td>
                                <td>{{ number_format($tempsaSCPercent, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Temps à CAP (jours)</td>
                                <td>{{ $tempsaCAP }}</td>
                                <td>{{ number_format($tempsaCAPPercent, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Total Temps à payée (jours)</td>
                                <td>{{ $totalTemps }}</td>
                                <td>{{ number_format($totalPercent, 2) }}</td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div>

@endsection
