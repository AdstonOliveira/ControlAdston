<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Model\OS\Equipamento;
use App\Model\OS\OrdemServico;
use App\Model\OS\StatusOS;
use App\Model\OS\TipoDefeito;
use App\Model\OS\TipoEquipamento;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordens = OrdemServico::all();
        return view("assistencia.lista", compact("ordens"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_equipamento = TipoEquipamento::all();

        return view("assistencia.os", compact("tipo_equipamento"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $equipamento = Equipamento::findOrFail($request->equipamentos);
        $os = new OrdemServico();
        
            $os->equip_id = $equipamento->id;
            $os->dt_abertura = Carbon::now();
            $os->defeito = $request->defeito;
            $os->aberto_por = Auth::user()->id;
            $os->nome_exibicao = $request->nome_exibicao;
            
        $os->save();
        
        return redirect()->route("os.edit",[$os->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function show(OrdemServico $ordemServico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {   
        $os = OrdemServico::findOrFail($id);
        $tipo_equipamento = TipoEquipamento::all();
        $tipos_defeito = TipoDefeito::all();
        $status = StatusOS::all();


        return view("assistencia.os", compact("tipo_equipamento","os","tipos_defeito", "status"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrdemServico $ordemServico)
    {
        $num_os = $request->numero;
        $tipo_def = $request->tipo_defeito;
        $solucao = $request->solucao;

        $os = OrdemServico::findOrFail($num_os);
        $os->tipo_defeito = $tipo_def;
        $os->solucao = $solucao;

        $os->update();

        return back()->with("success", "OS $os->id atualizada");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrdemServico  $ordemServico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, OrdemServico $ordemServico)
    {
        $os = OrdemServico::findOrFail($request->os_id_delete);
        $os->delete();

        return back()->with("success", "Ordem de Serviço apagada com sucesso");
    }
}
