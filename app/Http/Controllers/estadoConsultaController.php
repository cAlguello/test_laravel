<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class estadoConsultaController extends Controller
{
    public function verDatos(Request $request, $id){
        $Consulta = DB::table('consulta')
        ->join('empresa','id_empresa','=','empresa_id_empresa')
        ->select(DB::raw('count(*) as total, usuario_id_consulta'), 'empresa_id_empresa','nombre_empresa')
        ->where('usuario_id_consulta','=',$id)
        ->where('estado_consulta','=', 1)
        ->groupBy('empresa_id_empresa', 'usuario_id_consulta','nombre_empresa')
        ->get();
        return response()->json($Consulta);   
    }
}
