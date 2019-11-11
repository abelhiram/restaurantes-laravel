<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'metodos_pagos'; 
    protected $fillable = ['metodo_pago']; 
}
