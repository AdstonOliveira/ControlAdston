<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDivida extends Model
{
    use SoftDeletes;
    protected $table="dividas";
    protected $fillable = ["tipo"];


    public function dividas()
    {
        return $this->hasMany('App\Model\Admin\Divida', 'tipo_id', 'id');
    }
}
