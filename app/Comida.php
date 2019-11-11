<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    protected $table = 'comidas'; 
    protected $fillable = ['locales_id','categorias_id','nombre','descripcion','precio','foto_comida',];  
}
