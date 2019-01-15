<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colores_x_regla extends Model
{
    public $timestamps = false; //sobre escribe en false el timestamp que esta heredando
    //Con los sig comando se accede a la base de datos
    protected $table = 'colores_x_regla';
    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id_regla', 'id_pin'];
}
