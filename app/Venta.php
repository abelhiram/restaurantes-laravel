<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
   protected $table = 'detalle_ventas';   
	protected $fillable = ['comidas_id','cantidad','subtotal'];	
     
}
