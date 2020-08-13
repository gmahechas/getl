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
                (
                    SELECT sins.invoice_status_date
                    FROM invoice_status sins
                    WHERE sins.invoice_id_ref = ins.invoice_id_ref AND sins.invoice_status_date > ins.invoice_status_date
                    ORDER BY sins.invoice_status_date
                    LIMIT 1
                ) AS invoice_status_date_end,
                ROUND((TIMESTAMPDIFF(HOUR, ins.invoice_status_date,
                    (SELECT sins.invoice_status_date
                    FROM invoice_status sins
                    WHERE sins.invoice_id_ref = ins.invoice_id_ref AND sins.invoice_status_date > ins.invoice_status_date
                    ORDER BY sins.invoice_status_date
                    LIMIT 1)) / 24),1) AS invoice_status_date_diff
            FROM invoice_status ins
            ORDER BY ins.invoice_id_ref, ins.invoice_status_date DESC
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
