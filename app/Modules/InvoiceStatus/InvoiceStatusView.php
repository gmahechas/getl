<?php

namespace App\Modules\InvoiceStatus;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatusView extends Model
{
    protected $table = 'invoice_status_view';
    protected $fillable = [
        'invoice_status_date',
        'invoice_status_responsable',
        'invoice_id_ref',
        'status_id',
        'invoice_status_date_end',
        'invoice_status_date_diff',
    ];
}
