<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIniciativaProcesoTitulacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iniciativa_proceso_titulacion', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('iniciativa_id')->unsigned()->nullable();
            $table->foreign('iniciativa_id')->references('id')
            ->on('iniciativas')->onDelete('cascade');

            $table->integer('proceso_titulacion_id')->unsigned()->nullable();
            $table->foreign('proceso_titulacion_id')->references('id')
            ->on('proceso_titulacions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('iniciativa_proceso_titulacion');
    }
}
