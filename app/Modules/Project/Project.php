<?php

namespace App\Modules\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;
    protected $table = 'project';
    protected $fillable = [
        'id_ref',
        'project_name',
        'project_financing',
        'macroproject_id'
    ];
}
