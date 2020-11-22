<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnEstoque extends Model
{
    use SoftDeletes;
    protected $table="un_estoque";
    protected $fillable = ["UN","sigla","un_conversao"];
}
