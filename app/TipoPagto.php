<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPagto extends Model
{
    use SoftDeletes;
    protected $table = "tipo_pagto";
    protected $fillable = ["tipo"];


    public function formasPagto()
    {
        return $this->hasMany('App\FormaPagto', 'tipo_id');
    }
}
