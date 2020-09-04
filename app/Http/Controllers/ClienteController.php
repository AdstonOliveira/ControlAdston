<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Cliente;
use App\Estado;
use App\TipoCliente;
use App\TipoEndereco;
use App\TipoTelefone;
use Illuminate\Http\Request;
use SweetAlert;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_cliente = TipoCliente::all();
        $tipos_endereco = TipoEndereco::all();
        $estados = Estado::all();
        $cidade_default = Cidade::where('state_id',25)->get();
        $tipos_telefone = TipoTelefone::all();
        return view('cliente.index', compact('tipo_cliente', 'tipos_endereco','estados','cidade_default', 'tipos_telefone'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        dd($request->all());
        if($request->has('tipo_cliente')){
            dd($dados['rg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
