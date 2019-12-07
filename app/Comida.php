<?php

namespace App;
use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Comida extends Model
{
    use HasApiTokens;

    protected $table = 'comidas'; 
    protected $fillable = ['locales_id','categorias_id','nombre','descripcion','precio','foto_comida',];  
}
