<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW project_view AS
            SELECT
                p.*,
                m.macroproject_name,
                (
                    SELECT SUM(sc.chapter_budgeted)
                    FROM chapter_view sc
                    WHERE sc.project_id = p.id
                ) AS sum_project_chapter_budgeted,
				(
                    SELECT SUM(sc.sum_activity_budgeted)
                    FROM chapter_view sc
                    WHERE sc.project_id = p.id
                ) AS sum_project_activity_budgeted,
				(
                    SELECT SUM(sc.sum_activity_contracts_budgeted)
                    FROM chapter_view sc
                    WHERE sc.project_id = p.id
                ) AS sum_project_activity_contracts_budgeted,
				(
                    SELECT SUM(sc.sum_activity_contracts_invoices)
                    FROM chapter_view sc
                    WHERE sc.project_id = p.id
                ) AS sum_project_activity_contracts_invoices
            FROM project p
            JOIN macroproject m ON m.id = p.macroproject_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_view');
    }
}
