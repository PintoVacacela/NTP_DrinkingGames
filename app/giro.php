<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giro extends Model
{
    public $timestamps = false; //sobre escribe en false el timestamp que esta heredando
    //Con los sig comando se accede a la base de datos
    protected $table = 'giros';
    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id', 'giro'];
}
