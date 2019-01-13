<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class puntaje extends Model
{
    //
    public $timestamps = false; //sobre escribe en false el timestamp que esta heredando
    //Con los sig comando se accede a la base de datos
    protected $table = 'puntajes';

    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id','id_jugador', 'puntajes_cartas', 'puntajes_dados', 'puntajes_ruleta'];
}
