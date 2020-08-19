<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_status', function (Blueprint $table) {
            $table->id();
            $table->dateTime('invoice_status_date');
            $table->string('invoice_status_responsable', 128);
            $table->bigInteger('invoice_id_ref')->unsigned();

            $table->bigInteger('status_id')->unsigned();
            $table->foreign('status_id')
                ->references('id')
                ->on('status')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_status');
    }
}
