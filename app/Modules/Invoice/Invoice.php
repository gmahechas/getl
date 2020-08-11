<?php

namespace App\Modules\Invoice;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $timestamps = false;
    protected $table = 'invoice';
    protected $fillable = [
        'id_ref',
        'invoice_number',
        'invoice_date',
        'invoice_responsable',
        'invoice_total',
        'contract_id'
    ];
}
