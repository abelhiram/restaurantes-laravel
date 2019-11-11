<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTblDirecciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('locales_id')->nullable();
            $table->unsignedInteger('usuarios_id')->nullable();
            $table->unsignedInteger('pais_id');
            $table->unsignedInteger('estados_id');
            $table->unsignedInteger('municipios_id');
            $table->string('cp',8);
            $table->string('calle');
            $table->string('numero',8);
            $table->string('entre_calles')->nullable();
            $table->string('referencias')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->foreign('locales_id')->references('id')->on('locales');
            $table->foreign('pais_id')->references('id')->on('pais');
            $table->foreign('estados_id')->references('id')->on('estados');
            $table->foreign('municipios_id')->references('id')->on('municipios');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
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
        Schema::dropIfExists('direcciones');
    }
}
