<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Model\OS\Equipamento;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquipamentoController extends Controller
{
    public function store(Request $request){

        if(!$request->has("cliente_equip") || empty($request->cliente_equip) ){
            return response()->json(["erro"=> "Você não selecionou o cliente"], 422);
        }


        DB::beginTransaction();

        try{
            $equipamento = new Equipamento();
            $equipamento->tipo_id = $request->tipo_equip;
            $equipamento->pessoa_id = $request->cliente_equip;
            $equipamento->descricao = $request->desc_equipamento;
            $equipamento->marca = $request->marca_equip;
            $equipamento->modelo = $request->modelo_equip;
            $equipamento->num_serie = $request->num_serie;

            $equipamento->save();
            error_log("Equipamento salvo");
            DB::commit();
        return response()->json($equipamento, 200);
        }catch(Exception $e){
            DB::rollback();
            error_log("Erro ao salvar equipamento. ". $e->getMessage());
            return response()->json(["Erro ao salvar equipamento: ". $e->getMessage(), 500]);
        }
    }


    public function equipCliente(Request $request, $cliente_id = null){

        
        if( is_null($cliente_id) )
            $cliente = Cliente::find($request->cliente_id);
        else
            $cliente = Cliente::find($cliente_id);

        // return response()->json($cliente, 200);
        
        if(is_null($cliente)){
            return response()->json(['erro'=>"Cliente não encontrado"], 404);
        }

        $equipamentos = $cliente->equipamentos()->orderBy("created_at","DESC")->get();

        return response()->json($equipamentos, 200);
    }
}
