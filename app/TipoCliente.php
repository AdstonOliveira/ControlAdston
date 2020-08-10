<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoCliente extends Model
{
    use SoftDeletes;
    protected $table = "tipo_pessoa";
    protected $fillable = ["tipo","sigla"];


    public function cliente()
    {
        return $this->hasMany('App\Pessoa', 'tipo_id');
    }

}
