<?php

namespace App\Model\OS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoDefeito extends Model
{
    use SoftDeletes;
    protected $table = "tipo_defeitos";
    protected $fillable = ["descricao"];


    
}
