<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Telefone extends Model
{
    use SoftDeletes;
    protected $table = "telefones";
    protected $fillable = ["pessoa_id","telefone"];


    public function pessoa()
    {
        return $this->belongsTo('App\Cliente', 'pessoa_id');
    }
}
