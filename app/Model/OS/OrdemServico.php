<?php

namespace App\Model\OS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrdemServico extends Model
{
    use SoftDeletes;
    protected $table = "ordem_servico";

    protected $fillable = [ "nome_exibicao","equip_id", "tipo_defeito", "orcamento_id", "defeito", "solucao", "status_id","aberto_por"];
    protected $dates = ["dt_abertura","dt_encerramento"];


    public function equipamento(){
        return $this->belongsTo("App\Model\OS\Equipamento", "equip_id");
    }

    public function status(){
        return $this->belongsTo("App\Model\OS\StatusOS", "status_id");
    }

    public function abertoPor()
    {
        return $this->belongsTo('App\User', 'aberto_por');
    }


}
