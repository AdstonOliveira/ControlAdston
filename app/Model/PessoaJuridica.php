<?php

namespace App\Model;

use App\Cliente;
use Illuminate\Database\Eloquent\Model;

class PessoaJuridica extends Cliente
{
    protected $fillable = ["razao_social"];

}
