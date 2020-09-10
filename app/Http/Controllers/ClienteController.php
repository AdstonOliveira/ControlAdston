<?php

namespace App\Http\Controllers;

use App\Cidade;
use App\Cliente;
use App\Documentos;
use App\Endereco;
use App\Estado;
use App\Model\PessoaFisica;
use App\Model\PessoaJuridica;
use App\Telefone;
use App\TipoCliente;
use App\TipoEndereco;
use App\TipoTelefone;
use Exception;
use Illuminate\Http\Request;
// use SweetAlert;
use DB;
use UxWeb\SweetAlert\SweetAlert;

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

        // alert()->success('You have been logged out.', 'Good bye!');

        $tipo_cliente = TipoCliente::all();
        $tipos_endereco = TipoEndereco::all();
        $estados = Estado::all();
        $cidade_default = Cidade::where('state_id', 25)->get();
        $tipos_telefone = TipoTelefone::all();

        return view('cliente.index', compact('tipo_cliente', 'tipos_endereco', 'estados', 'cidade_default', 'tipos_telefone'));
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

        SweetAlert::success('Success Message', 'Optional Title');
        return redirect()->back()->with("success", "Deu certo");
        // dd($dados);
        DB::beginTransaction();
        try {
            if ($dados["tipo_cliente"] == 1) {
                $pessoa = new PessoaFisica();
            } else if ($dados['tipo_cliente'] == 2) {
                $pessoa = new PessoaJuridica();
            } else {
                // Inserir Classe fornecedor
                $pessoa = new PessoaJuridica();
            }

            $pessoa->nome = $dados['nome'];
            $pessoa->email = $dados['email'];

            if($request->has('dt_nascimento')){
                // dd($dados['dt_nascimento']);
                $pessoa->dt_nascimento = $dados['dt_nascimento'];
            }


            if ($request->has('razao_social')) {
                $pessoa->razao_social = $dados['razao_social'];
            } else {
                $pessoa->sobrenome = $dados['sobrenome'];
            }

            $documentos = Documentos::create(['cpf_cnpj' => $dados['cpf'], 'rg_ie' => $dados['rg']]);
            $pessoa->docs_id = $documentos->id;

            $pessoa->save();
            $endereco = Endereco::create(
                [
                    'pessoa_id' => $pessoa->id,
                    'tipo_id' => $dados['tipo_endereco'],
                    'logradouro' => $dados['rua'],
                    'num' => $dados['num'],
                    'complemento' => $dados['complemento'],
                    'bairro' => $dados['bairro'],
                    'cep' => $dados['cep'],
                    'cidade_id' => $dados['cidade']
                ]
            );

            if(!is_null($dados["comercial"])){
                Telefone::create(['pessoa_id'=>$pessoa->id, 'telefone'=>$dados['comercial'], 'tipo_id'=>1]);
            }
            if(!is_null($dados["residencial"])){
                Telefone::create(['pessoa_id'=>$pessoa->id, 'telefone'=>$dados['residencial'], 'tipo_id'=>2]);
            }
            if(!is_null($dados["celular"])){
                Telefone::create(['pessoa_id'=>$pessoa->id, 'telefone'=>$dados['celular'], 'tipo_id'=>4]);
            }

            SweetAlert::message('Robots are working!');

            DB::commit();


            return redirect()->back()->with("success", "Deu certo");
        } catch (Exception $e) {
            error_log("Erro: " . $e);
            dd($e);
            return back()->with('error', "Erro ao salvar dados");
            DB::rollback();
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
