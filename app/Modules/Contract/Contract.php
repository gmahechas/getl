<?php

namespace App\Modules\Contract;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public $timestamps = false;
    protected $table = 'contract';
    protected $fillable = [
        'id_ref',
        'contract_provider',
        'contract_budgeted',
        'activity_id'
    ];
}
