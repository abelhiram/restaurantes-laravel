<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = 'estados'; 
    protected $fillable = ['pais_id','nombre'];  
}
