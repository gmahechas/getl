<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceStatusViewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('
        CREATE OR REPLACE VIEW invoice_status_view AS
            SELECT
                ins.*,
                i.id_ref AS invoice_id_ref,
                i.invoice_number AS invoice_number,
                (
                    SELECT sins.invoice_status_date
                    FROM invoice_status sins
                    WHERE sins.invoice_id = ins.invoice_id AND sins.invoice_status_date > ins.invoice_status_date
                    ORDER BY sins.invoice_status_date
                    LIMIT 1
                ) AS invoice_status_date_end,
                ROUND((TIMESTAMPDIFF(HOUR, ins.invoice_status_date,
                    (SELECT sins.invoice_status_date
                    FROM invoice_status sins
                    WHERE sins.invoice_id = ins.invoice_id AND sins.invoice_status_date > ins.invoice_status_date
                    ORDER BY sins.invoice_status_date
                    LIMIT 1)) / 24),1) AS invoice_status_date_diff
            FROM invoice_status ins
            JOIN invoice i ON i.id = ins.invoice_id
            ORDER BY ins.invoice_id, ins.invoice_status_date DESC
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_status_view');
    }
}
