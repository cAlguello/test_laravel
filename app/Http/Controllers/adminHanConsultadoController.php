<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminHanConsultadoController extends Controller
{
    public function verDatos(Request $request){
    $Consulta = DB::table('consulta')
    ->join('usuario','usuario_id_consulta','=','id')
        ->join('empresa as empresa1','usuario_id_empresa','=','id')
        ->join('empresa as empresa2', 'empresa_id_empresa','=','empresa2.id_empresa')
        ->select(DB::raw('count(*) as total, empresa_id_empresa'),'empresa2.nombre_empresa as empresa_consultada', 'usuario_id_consulta','empresa1.nombre_empresa as empresa_consultora')
        //->where('empresa_id_empresa','=','id')
        ->groupBy('empresa_id_empresa', 'empresa2.nombre_empresa' , 'usuario_id_consulta','empresa1.nombre_empresa')
        ->get();
        return response()->json($Consulta);   
}

}