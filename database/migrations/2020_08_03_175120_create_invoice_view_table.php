<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW invoice_view AS
            SELECT
                i.*,
                c.id_ref AS contract_id_ref,
                c.contract_provider,
                (
                    SELECT ss.status_description
                    FROM invoice_status sis
                    JOIN status ss ON ss.id = sis.status_id
                    WHERE sis.invoice_id_ref = i.id_ref
                    ORDER BY sis.invoice_status_date DESC
                    LIMIT 1
                ) AS status_description,
                (
                    SELECT sis.status_id
                    FROM invoice_status sis
                    WHERE sis.invoice_id_ref = i.id_ref
                    ORDER BY sis.invoice_status_date DESC
                    LIMIT 1
                ) AS status_id
            FROM invoice i
            JOIN contract c ON c.id = i.contract_id
            ORDER BY i.invoice_date DESC
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_view');
    }
}
