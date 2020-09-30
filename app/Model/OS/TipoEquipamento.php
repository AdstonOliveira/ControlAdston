<?php

namespace App\Model\OS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEquipamento extends Model
{
    use SoftDeletes;
    protected $table = "tipo_equipamento";
    protected $fillable = ["id","tipo"];

    public function equipamentos()
    {
        return $this->hasMany('App\Model\OS\Equipamento', 'tipo_id', 'id');
    }
}
