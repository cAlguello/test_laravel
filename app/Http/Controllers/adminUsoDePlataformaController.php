<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class adminUsoDePlataformaController extends Controller
{
    public function verDatos(Request $request){
        $Consulta = DB::table('consulta')
        ->join('usuario','usuario_id_consulta','=','id')
            ->join('empresa','usuario_id_empresa','=','id')
            ->select(DB::raw('count(*) as total, usuario_id_consulta'),'usuario_id_empresa' ,'nombre_empresa')
            //->where('empresa_id_empresa','=','id')
            ->groupBy('usuario_id_consulta','usuario_id_empresa','nombre_empresa')
            ->get();
            return response()->json($Consulta);   
    }
    public function contarDatos(Request $request){
        $Consulta = DB::table('consulta')
            ->count();
            return response()->json($Consulta);   
    }

    public function contarProductos(Request $request){
        $Consulta = DB::table('empresa_has_producto')
            ->count();
            return response()->json($Consulta);   
    }
}
