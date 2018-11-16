<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reglas_x_juegos extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_reglas', 'id_juego'];
}
