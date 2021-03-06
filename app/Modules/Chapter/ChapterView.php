<?php

namespace App\Modules\Chapter;

use Illuminate\Database\Eloquent\Model;

class ChapterView extends Model
{
    protected $table = 'chapter_view';
    protected $fillable = [
        'id_ref',
        'chapter_name',
        'chapter_budgeted',
        'project_id',
        'project_name',
        'sum_activity_budgeted',
        'sum_activity_contracts_budgeted',
        'sum_activity_contracts_invoices'
    ];
}
