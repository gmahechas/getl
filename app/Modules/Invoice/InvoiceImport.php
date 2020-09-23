<?php

namespace App\Modules\Invoice;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class InvoiceImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Invoice([
            'id_ref'     => str_replace(' ', '', $row['id']),
            'invoice_number'    => $row['numero_factura'],
            'invoice_date' => Date::excelToDateTimeObject($row['fecha']),
            'invoice_total' => $row['total'],
            'contract_id' => 1,
        ]);
    }

}
