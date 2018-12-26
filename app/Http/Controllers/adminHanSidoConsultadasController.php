<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminHanSidoConsultadasController extends Controller
{
    public function verDatos(Request $request){
        $Consulta = DB::table('consulta')
        ->join('empresa','id_empresa','=','empresa_id_empresa')
        ->join('usuario', 'id', '=', 'usuario_id_empresa' )
        ->select(DB::raw('count(*) as total, empresa_id_empresa'),'usuario_id_empresa', 'empresa_id_empresa','nombre_empresa')
        ->groupBy('empresa_id_empresa', 'usuario_id_empresa','empresa_id_empresa','nombre_empresa')
        ->get();
        return response()->json($Consulta);   
    }
}
