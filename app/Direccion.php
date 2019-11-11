<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $table = 'direcciones'; 
    protected $fillable = ['usuarios_id','locales_id','pais_id','estados_id','municipios_id','cp','calle','numero','entre_calles','referencias','lat','long'];  
}
