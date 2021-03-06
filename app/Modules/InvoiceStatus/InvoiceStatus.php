<?php

namespace App\Modules\InvoiceStatus;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    public $timestamps = false;
    protected $table = 'invoice_status';
    protected $fillable = [
        'invoice_status_date',
        'invoice_status_responsable',
        'invoice_id_ref',
        'status_id'
    ];
}
