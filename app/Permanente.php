<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permanente extends Model
{
    protected $fillable = array('nome', 'telefone', 'email', 'dataInicial', 'dataFinal', 'hora');
    public $timestamps = false;
}
