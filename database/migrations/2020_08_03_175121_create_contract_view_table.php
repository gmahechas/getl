<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW contract_view AS
            SELECT
                c.*,
                a.activity_name,
                (
                    SELECT SUM(si.invoice_total)
                    FROM invoice_view si
                    WHERE si.contract_id = c.id
                ) AS sum_invoices
            FROM contract c
            JOIN activity a ON a.id = c.activity_id
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contract_view');
    }
}
