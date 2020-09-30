<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $table="pessoas";
    protected $fillable = ["id","nome", "email", "tipo_id", "docs_id"];


    public function tipo()
    {
        return $this->belongsTo('App\TipoCliente', 'tipo_id');
    }

    public function documentos()
    {
        return $this->belongsTo('App\Documentos', 'docs_id');
    }

    public function telefones()
    {
        return $this->hasMany('App\Telefone', 'pessoa_id');
    }

    public function enderecos()
    {
        return $this->hasMany('App\Endereco', 'pessoa_id');
    }
    
    public function equipamentos()
    {
        return $this->hasMany('App\Model\OS\Equipamento', 'pessoa_id');
    }


    








}
