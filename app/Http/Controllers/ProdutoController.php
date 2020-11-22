<?php

namespace App\Http\Controllers;

use App\Model\Estoque\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){

        $produtos = Produto::all();

        return view('produtos.main', compact('produtos'));
    }
}
