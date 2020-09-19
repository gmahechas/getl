<?php

namespace App\Modules\InvoiceStatus;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class InvoiceStatusImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // echo '<pre>' . print_r($row, true) . '</pre>';
        return new InvoiceStatus([
            'invoice_status_date' => Date::excelToDateTimeObject($row['fecha'])->format('Y-m-d H:i:s'),
            'invoice_status_responsable' => $row['persona'],
            'invoice_id_ref' => $row['id_parent'],
            'status_id' => $this->getState(trim($row['estado']))
        ]);
    }

    private function getState($stringState)
    {
        $state = [
            'À traiter' => 1,
            'En Cours' => 2,
            'En cours' => 2,
            'Non conforme' => 3,
            'À valider CP' => 4,
            'En attente' => 5,
            'À autoriser CSC' => 6,
            'Correction' => 7,
            'Autorisée CSC' => 8,
            'Envoyée CAP' => 9,
            'Payée' => 10,
            'A supprimer' => 11,
        ];

        return $state[$stringState];
    }

}
