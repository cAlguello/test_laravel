<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminMasHanConcretadoContactoController extends Controller
{
    public function verDatos(Request $request){
        $Consulta = DB::table('consulta')
        ->join('usuario','id','=','usuario_id_consulta')
        ->join('empresa','usuario_id_empresa','=','id')        
        ->select(DB::raw('count(*) as total, usuario_id_consulta'), 'id_empresa', 'id', 'nombre_empresa')
        ->where('estado_consulta','=', 1)
        ->groupBy('id_empresa','id', 'nombre_empresa')
        ->get();
        return response()->json($Consulta);   
    }
}
