<?php

namespace App\Modules\Macroproject;

use Illuminate\Database\Eloquent\Model;

class Macroproject extends Model
{
    public $timestamps = false;
    protected $table = 'macroproject';
    protected $fillable = [
        'id_ref',
        'macroproject_name'
    ];
}
