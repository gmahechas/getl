<?php

namespace App\Modules\Status;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public $timestamps = false;
    protected $table = 'status';
    protected $fillable = [
        'status_description'
    ];
}
