<?php

namespace App\Modules\Project;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'project';
    protected $fillable = [
        'project_name',
        'id_ref',
        'project_financing',
        'macroproject_id'
    ];

    public function macroproject()
    {
		return $this->belongsTo(\App\Modules\Macroproject\Macroproject::class);
	}
}
