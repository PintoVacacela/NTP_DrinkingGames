<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ruleta extends Model
{
    public $timestamps = false;
    protected $table = 'ruletas';
    //protected $primaryKey = 'nombreidpersolanizado';
    protected $fillable = ['id', 'color_led', 'pin'];
}