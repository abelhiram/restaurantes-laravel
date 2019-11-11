<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';   
	protected $fillable = ['detalles_id','usuarios_id','direccion_id','total','estado','metodo_pago'];	
}
