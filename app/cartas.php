<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cartas extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'numero', 'palo', 'imagen'];
}
