<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UnCompra extends Model
{
    use SoftDeletes;
    protected $table="un_compra";
    protected $fillable = ["UN","sigla","un_conversao"];
}
