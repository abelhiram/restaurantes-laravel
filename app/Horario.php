<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{

	protected $table = 'horarios';   
	protected $fillable = ['locales_id','dia','hora_apertura','hora_cierre'];	
     
}
