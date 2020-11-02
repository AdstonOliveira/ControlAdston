<?php

namespace App\Model\Vendas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orcamento extends Model
{
    use SoftDeletes;
    protected $table = "orcamento";
    protected $fillable = ["pessoa_id","status_id","nome_exibicao"];
    protected $dates = ["dt_abertura","dt_encerramento"];
}
