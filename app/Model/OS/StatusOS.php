<?php

namespace App\Model\OS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusOS extends Model
{
    use SoftDeletes;
    protected $table = "status_os";
    protected $fillable = ["status"];

    public function OrdemServicos(){
        return $this->hasMany("App\Model\OS\OrdemServico","status_id");
    }


    public function returnFormatClass($definido){
        
        if($this->id == 5){
            return $definido == true ? "btn-danger": "btn-outline-danger";
        }
        if($this->id == 2){
            return $definido == true ? "btn-warning" : "btn-outline-secondary";
        }

        return $definido == true ? "btn-success" : "btn-outline-secondary";

    }
}
