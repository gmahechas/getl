<?php

namespace App\Modules\Activity;

use Illuminate\Database\Eloquent\Model;

class ActivityView extends Model
{
    protected $table = 'activity_view';
    protected $fillable = [
        'id_ref',
        'activity_name',
        'activity_budgeted',
        'chapter_id',
        'chapter_name'
    ];
}
