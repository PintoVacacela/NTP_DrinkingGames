<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jugador extends Model
{
    //
    public $timestamps = false; //sobre escribe en false el timestamp que esta heredando
    //Con los sig comando se accede a la base de datos
    //protected $table = 'minombredetabla';
    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id_jugadores', 'apodo', 'nombre', 'apellido', 'fechaNac'];
}
