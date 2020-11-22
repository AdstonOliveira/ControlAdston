<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Model\Admin\TipoDivida;
use Illuminate\Http\Request;

class DividaController extends Controller
{
    public function index(){
        return view('financeiro.main');
    }

    public function create(){

        $credores = Cliente::where('tipo_id', 3)->orWhere("tipo_id", 4)->get();
        $tipo_divida = TipoDivida::all();
        // dd($credores);
        return view("financeiro.index", compact("credores","tipo_divida"));
    }
}
