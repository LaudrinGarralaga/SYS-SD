<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    protected $fillable = array('nome', 'telefone', 'email', 'data', 'hora');
    public $timestamps = false;
}
