<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnVenda extends Model
{
    use SoftDeletes;
    protected $table="un_venda";
    protected $fillable = ["UN","sigla","un_conversao"];
}
