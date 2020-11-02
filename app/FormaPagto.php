<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormaPagto extends Model
{
    use SoftDeletes;
    protected $table = "forma_pagto";
    protected $fillable = ["forma","tipo_id"];



    public function tipo()
    {
        return $this->belongsTo('App\TipoPagto', 'tipo_id');
    }
}
