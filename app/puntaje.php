<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puntaje extends Model
{
    //
    public $timestamps = false; //sobre escribe en false el timestamp que esta heredando
    //Con los sig comando se accede a la base de datos
    //protected $table = 'minombredetabla';
    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id_jugadores', 'puntaje_cartas', 'puntaje_dados', 'puntaje_ruleta'];
}
