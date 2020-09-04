<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoTelefone extends Model
{
    use SoftDeletes;
    protected $table = "tipo_telefones";
    protected $fillable = ['tipo, sigla'];


    public function telefones()
    {
        return $this->hasMany('App\Telefone', 'tipo_id');
    }
}
