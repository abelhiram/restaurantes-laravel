<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTblPedidos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('detalles_id');
            $table->unsignedInteger('usuarios_id');
            $table->unsignedInteger('direccion_id');            
            $table->double('total',8,2);
            $table->enum('estado',['iniciado','pendiente','completado']);
            $table->string('metodo_pago')->nullable();
            $table->foreign('detalles_id')->references('id')->on('detalle_ventas');
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
            $table->foreign('direccion_id')->references('id')->on('direcciones');
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
        Schema::dropIfExists('pedidos');
    }
}
