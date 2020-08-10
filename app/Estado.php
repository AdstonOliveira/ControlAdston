<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table = "states";
    protected $fillable = ["name","abbreviation"];

    public function cidades()
    {
        return $this->hasMany('App\Cidade', 'state_id');
    }
}
