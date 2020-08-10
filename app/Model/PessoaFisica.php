<?php

namespace App\Model;

use App\Cliente;

class PessoaFisica extends Cliente
{

    protected $fillable = ["nome", "sobrenome"];
    protected $dates = ["dt_nascimento"];




}
