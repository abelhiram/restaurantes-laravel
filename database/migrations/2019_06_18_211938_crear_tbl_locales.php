<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTblLocales extends Migration
{


    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('usuario_id');
            //$table->unsignedInteger('direcciones_id');
            $table->string('nombre');
            $table->binary('imagen_destacada');
            $table->enum('activo',['1','2']);
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            //$table->foreign('direcciones_id')->references('id')->on('direcciones');
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
        Schema::dropIfExists('locales');
    }
}
