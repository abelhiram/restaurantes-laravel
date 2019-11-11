<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
	
    protected $table = 'locales'; 
    protected $fillable = ['usuario_id','nombre','imagen_destacada','activo'];
}
