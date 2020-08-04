<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_ref')->unsigned();
            $table->string('project_name', 128);
            $table->decimal('project_financing', 16, 2);

            $table->bigInteger('macroproject_id')->unsigned();
            $table->foreign('macroproject_id')
                ->references('id')
                ->on('macroproject')
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
        Schema::dropIfExists('project');
    }
}
