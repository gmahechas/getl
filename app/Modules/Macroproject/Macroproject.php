<?php

namespace App\Modules\Macroproject;

use Illuminate\Database\Eloquent\Model;

class Macroproject extends Model
{
    protected $table = 'macroproject';
    protected $fillable = [
        'macroproject_name',
        'id_ref'
    ];

    public function projects()
    {
		return $this->hasMany(\App\Modules\Project\Project::class);
	}
}
