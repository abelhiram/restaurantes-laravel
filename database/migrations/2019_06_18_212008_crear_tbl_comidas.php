<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTblComidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comidas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('locales_id');
            $table->unsignedInteger('categorias_id');
            $table->string('nombre');
            $table->string('descripcion');
            $table->double('precio',8,2);
            $table->binary('foto_comida');
            $table->foreign('categorias_id')->references('id')->on('categorias');
            $table->foreign('locales_id')->references('id')->on('locales');
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
        Schema::dropIfExists('comidas');
    }
}
