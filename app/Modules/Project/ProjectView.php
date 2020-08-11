<?php

namespace App\Modules\Project;

use Illuminate\Database\Eloquent\Model;

class ProjectView extends Model
{
    protected $table = 'project_view';
    protected $fillable = [
        'project_name',
        'macroproject_id',
        'macroproject_name',
        'sum_project_chapter_budgeted',
        'sum_project_activity_budgeted',
        'sum_project_activity_contracts_budgeted',
        'sum_project_activity_contracts_invoices'
    ];
}
