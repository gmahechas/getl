<?php

namespace App\Modules\Invoice;

use Illuminate\Database\Eloquent\Model;

class InvoiceView extends Model
{
    protected $table = 'invoice_view';
    protected $fillable = [
        'id_ref',
        'invoice_number',
        'invoice_date',
        'invoice_total',
        'contract_id',
        'contract_id_ref',
        'contract_provider',
        'status_description',
        'status_id',
        'invoice_status_date',
        'invoice_status_responsable',
    ];
}
