<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reglas extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'descripcion'];
}