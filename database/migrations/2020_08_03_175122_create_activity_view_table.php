<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW activity_view AS
            SELECT
                a.*,
                c.chapter_name,
                (
                    SELECT SUM(sc.contract_budgeted)
                    FROM contract_view sc
                    WHERE sc.activity_id = a.id
                ) AS sum_contracts_budgeted,
				(
                    SELECT SUM(sc.sum_invoices)
                    FROM contract_view sc
                    WHERE sc.activity_id = a.id
                ) AS sum_contracts_invoices
            FROM activity a
            JOIN chapter c ON c.id = a.chapter_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_view');
    }
}
