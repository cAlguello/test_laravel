<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class hanConsultadoController extends Controller
{
    public function verDatos(Request $request, $id){
        
        $Consulta = DB::table('consulta')        
        ->join('usuario','usuario_id_consulta','=','id')
        ->join('empresa','usuario_id_empresa','=','id')
        ->select(DB::raw('count(*) as total, empresa_id_empresa'), 'usuario_id_consulta','nombre_empresa')
        ->where('empresa_id_empresa','=',$id)
        ->groupBy('empresa_id_empresa', 'usuario_id_consulta','nombre_empresa')
        ->get();
        return response()->json($Consulta);   
        
    }
}
