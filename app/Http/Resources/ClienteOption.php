<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteOption extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return 
        [
            'id'=>$this->id,
            'nome'=> $this->nome . " " . $this->sobrenome,
            'identificacao'=>$this->documentos->cpf_cnpj,
            'docs'=>$this->documentos
        ];
    }
}
