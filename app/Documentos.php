<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentos extends Model
{
    use SoftDeletes;
    
    protected $table = "documentos";
    protected $fillable = ["cpf_cnpj", "rg_ie","im"];

    public function pessoa()
    {
        return $this->hasOne('App\Cliente', 'docs_id');
    }

}
