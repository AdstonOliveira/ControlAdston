<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoEndereco extends Model
{
    use SoftDeletes;
    protected $table = "tipo_enderecos";
    protected $fillable = ["tipo"];

    public function enderecos()
    {
        return $this->hasMany('App\Endereco', 'tipo_id');
    }


}
