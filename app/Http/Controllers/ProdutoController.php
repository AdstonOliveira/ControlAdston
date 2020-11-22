<?php

namespace App\Http\Controllers;

use App\Model\Estoque\Produto;
use App\UnCompra;
use App\UnEstoque;
use App\UnVenda;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(){

        $produtos = Produto::all();

        return view('produtos.main', compact('produtos'));
    }

    public function create(){

        $uns_venda = UnVenda::all();
        $uns_compra = UnCompra::all();
        $uns_estoque = UnEstoque::all();



        return view('produtos.novo', compact('uns_venda','uns_compra','uns_estoque'));
    }

    public function store(Request $request){
        dd($request->all());

    }
}
