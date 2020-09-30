<?php

namespace App\Model\OS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipamento extends Model
{
    use SoftDeletes;

    protected $table = "equipamentos";
    protected $fillable = ["id","tipo_id", "descricao","marca", "modelo","pessoa_id"];

    public function tipo()
    {
        return $this->belongsTo('App\Model\OS\TipoEquipamento', 'tipo_id');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Cliente', 'pessoa_id');
    }
}
