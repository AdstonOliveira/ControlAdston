<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\FormaPagto;
use App\Http\Resources\ClienteOption;
use App\Model\OS\OrdemServico;
use App\Model\OS\StatusOS;
use App\TipoPagto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    

    public function selectClientes($nome){

        $clientes = Cliente::where('nome','like','%'.$nome.'%')->orWhere('sobrenome','%'.$nome.'%')->get();

        // return response()->json($request->all(), 200);
        return ClienteOption::collection($clientes);
    }

    public function updateStatus($id_os, $id_status){

        $os = OrdemServico::findOrFail($id_os);
        $status = StatusOS::findOrFail($id_status);

        DB::beginTransaction();
        try{
            $os->status_id = $status->id;
            $os->update();
            DB::commit();
            return response()->json($os, 200);
        }catch(Exception $e){
            DB::rollback();
            error_log("Erro ao vincular status a os: ".$e->getMessage());
            return response()->json(["Erro ao salvar equipamento: ". $e->getMessage(), 500]);
        }
        
    }

    public function formaPagto($tipo_id){
        
        $formas = TipoPagto::findOrFail($tipo_id);

        return response()->json($formas->formasPagto, 200);
    }


}
