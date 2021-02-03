<?php

namespace App\Modules\InvoiceStatus;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Modules\Invoice\Invoice;
use App\Modules\InvoiceStatus\InvoiceStatus;


class InvoiceStatusPayeeImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

              // echo '<pre>' . print_r($row, true) . '</pre>';
        $invoice = Invoice::where('invoice_number', trim($row['factura']))->get();
        if(count($invoice) > 0) {

          if($row['ultimo_pago']) {
            $id = $invoice[0]->id;
            $id_ref = $invoice[0]->id_ref;
            $ultimo_pago = Date::excelToDateTimeObject($row['ultimo_pago'])->format('Y-m-d');

            $invoice_status = InvoiceStatus::where('invoice_id_ref', $id_ref)->where('status_id', 10)->update(['invoice_status_date' => $ultimo_pago.' 12:00:00']);

            if($invoice_status) {
              $newInvoice = Invoice::where('id', $id)->update(['payee_status' => true]);
            }
          }

        } else {
          echo 'No Encontrada';
        }
        
        echo '<hr />';
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
            'Supprimée' => 12
        ];

        return $state[$stringState];
    }

}
