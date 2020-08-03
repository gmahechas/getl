<?php

namespace App\Modules\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectView extends Model
{
    protected $table = 'project_view';
    protected $fillable = [
        'project_name',
        'macroproject_id',
        'macroproject_name'
    ];
}
