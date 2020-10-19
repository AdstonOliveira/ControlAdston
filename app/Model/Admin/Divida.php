<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Divida extends Model
{
    use SoftDeletes;
    protected $table="dividas";
    protected $fillable = ["status","pessoa_id", "valor", "dt_vencimento", "dt_pagto","tipo_id"];


    public function credor()
    {
        return $this->belongsTo('App\Cliente', 'pessoa_id');
    }
    
    public function tipo()
    {
        return $this->belongsTo('App\Model\Admin\TipoDivida', 'tipo_id');
    }
}
