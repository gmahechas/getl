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
                    SELECT sis.invoice_status_status
                    FROM invoice_status sis
                    WHERE sis.invoice_id = i.id
                    ORDER BY sis.invoice_status_date DESC
                    LIMIT 1
                ) AS invoice_status_status,
                (
                    SELECT sis.invoice_status_date
                    FROM invoice_status sis
                    WHERE sis.invoice_id = i.id
                    ORDER BY sis.invoice_status_date DESC
                    LIMIT 1
                ) AS invoice_status_date,
                (
                    SELECT sis.invoice_status_responsable
                    FROM invoice_status sis
                    WHERE sis.invoice_id = i.id
                    ORDER BY sis.invoice_status_date DESC
                    LIMIT 1
                ) AS invoice_status_responsable
            FROM invoice i
            JOIN contract c ON c.id = i.contract_id
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
