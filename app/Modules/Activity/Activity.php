<?php

namespace App\Modules\Activity;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps = false;
    protected $table = 'activity';
    protected $fillable = [
        'id_ref',
        'activity_name',
        'activity_budgeted',
        'chapter_id'
    ];
}
