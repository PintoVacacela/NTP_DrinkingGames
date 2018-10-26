<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dado extends Model
{
    //
    // Table Name
    protected $table = 'dados';
    //  Primary Key
    public $primaryKey = 'id';
    // Timestapms
    public $timestamps = true;

}
