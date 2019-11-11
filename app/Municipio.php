<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table = 'municipios'; 
    protected $fillable = ['estado_id','nombre'];  

    public static function towns($id){
    	return Municipio::where('estado_id','=',$id)
    	->get();
    }
}
