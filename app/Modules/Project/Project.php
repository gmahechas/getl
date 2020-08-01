<?php

namespace App\Modules\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'project_name',
        'macroproject_id'
    ];
}
