<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;
    
    protected $table = "enderecos";
    protected $fillable = ["pessoa_id", "tipo_id", "logradouro","num", "bairro", "cidade_id", "cep"];


    public function cliente()
    {
        return $this->belongsTo('App\Pessoa', 'pessoa_id');
    }

    public function tipo()
    {
        return $this->belongsTo('App\TipoEndereco', 'tipo_id');
    }

    public function cidade()
    {
        return $this->belongsTo('App\Cidade', 'cidade_id');
    }



}
