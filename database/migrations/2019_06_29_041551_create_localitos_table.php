<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localitos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id');
            $table->integer('direcciones_id');
            $table->string('nombre');
            $table->string('imagen_destacada');
            $table->enum('activo',['1','2']);
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
        Schema::dropIfExists('localitos');
    }
}
