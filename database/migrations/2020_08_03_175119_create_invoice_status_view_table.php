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
					WHERE sins.invoice_id = ins.invoice_id
					ORDER BY sins.invoice_status_date DESC
					LIMIT 1,1
                ) AS invoice_status_date_end
            FROM invoice_status ins
            JOIN invoice i ON i.id = ins.invoice_id
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
