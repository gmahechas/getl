<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ref')->unsigned();
            $table->string('invoice_number', 128);
            $table->date('invoice_date');
            $table->text('invoice_responsable');
            $table->decimal('invoice_total', 16, 2);

            $table->bigInteger('contract_id')->unsigned();
            $table->foreign('contract_id')
                ->references('id')
                ->on('contract')
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
        Schema::dropIfExists('invoice');
    }
}
