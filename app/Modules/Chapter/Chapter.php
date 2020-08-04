<?php

namespace App\Modules\Chapter;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public $timestamps = false;
    protected $table = 'chapter';
    protected $fillable = [
        'id_ref',
        'chapter_name',
        'chapter_budgeted',
        'project_id'
    ];
}
