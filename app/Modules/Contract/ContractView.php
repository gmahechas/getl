<?php

namespace App\Modules\Contract;

use Illuminate\Database\Eloquent\Model;

class ContractView extends Model
{
    protected $table = 'contract_view';
    protected $fillable = [
        'id_ref',
        'contract_provider',
        'contract_budgeted',
        'activity_id',
        'activity_name',
        'sum_invoices'
    ];
}
