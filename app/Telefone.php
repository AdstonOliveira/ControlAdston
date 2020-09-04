<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes;
    protected $table = "telefones";
    protected $fillable = ["pessoa_id","telefone", "tipo_id"];


    public function pessoa()
    {
        return $this->belongsTo('App\Cliente', 'pessoa_id');
    }

    public function tipo(){
        return $this->hasOne("App\TipoTelefone", "tipo_id");
    }
}
