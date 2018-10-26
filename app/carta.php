<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class carta extends Model
{
    public $timestamps = false;

    protected $fillable = ['id_cartas', 'numero', 'palo', 'imagen'];
}
