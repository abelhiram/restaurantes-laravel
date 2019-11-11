<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mdlLocalitos extends Model
{
     protected $table = 'localitos'; 
    protected $fillable = ['usuario_id','direcciones_id','nombre','imagen_destacada','activo'];  
}
