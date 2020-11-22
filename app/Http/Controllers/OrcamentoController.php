<?php

namespace App\Http\Controllers;

use App\TipoPagto;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    public function index(){

        return view("vendas.main");
    }

    public function create(){

        $condicoes = TipoPagto::all();

        return view("vendas.index",compact("condicoes"));
    }
}
