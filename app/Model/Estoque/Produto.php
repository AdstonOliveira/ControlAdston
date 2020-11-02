<?php

namespace App\Model\Estoque;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use SoftDeletes;
    protected $table = "produto";
    protected $fillable = ["produto"];
}
