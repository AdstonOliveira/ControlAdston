<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Http\Resources\ClienteOption;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    

    public function selectClientes($nome){


        $clientes = Cliente::where('nome','like','%'.$nome.'%')->get();

        // return response()->json($request->all(), 200);
        return ClienteOption::collection($clientes);
    }


}
