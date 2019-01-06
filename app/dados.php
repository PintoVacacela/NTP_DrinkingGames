<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dados extends Model
{
    //
    // Table Name
    protected $table = 'dados';
    //  Primary Key
    public $primaryKey = 'id';
    // Timestapms
    protected $fillable = ['id', 'nombre','imagen'];

}
