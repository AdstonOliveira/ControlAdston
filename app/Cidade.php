<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cidade extends Model
{

    protected $table = "cities";
    protected $fillable = ['name','ibge_code','state_id'];


    public function estado()
    {
        return $this->belongsTo('App\Estado', 'state_id');
    }

    public function enderecos(){
        return $this->hasMany("App\Endereco", "cidade_id");
    }

}
