<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW chapter_view AS
            SELECT
                c.*,
                p.project_name,
                (
                    SELECT SUM(sa.activity_budgeted)
                    FROM activity_view sa
                    WHERE sa.chapter_id = c.id
                ) AS sum_activity_budgeted,
				(
                    SELECT SUM(sa.sum_contracts_budgeted)
                    FROM activity_view sa
                    WHERE sa.chapter_id = c.id
                ) AS sum_activity_contracts_budgeted,
				(
                    SELECT SUM(sa.sum_contracts_invoices)
                    FROM activity_view sa
                    WHERE sa.chapter_id = c.id
                ) AS sum_activity_contracts_invoices
            FROM chapter c
            JOIN project p ON p.id = c.project_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapter_view');
    }
}
