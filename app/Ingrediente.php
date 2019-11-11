<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $table = 'ingredientes';   
	protected $fillable = ['comidas_id','nombre','precio'];
	
}
