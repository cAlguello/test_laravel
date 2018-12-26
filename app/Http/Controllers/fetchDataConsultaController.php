<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class fetchDataConsultaController extends Controller
{
    public function verDatos(Request $request, $id){ 
        $Date = Carbon::now()->toDateString();

        $Consulta = DB::table('empresa_has_giro')
        ->join('empresa','id_empresa','=','empresa_id_empresa')
        ->join('giro', 'id_giro', '=', 'giro_id_giro' )
        ->join('area_giro', 'id_area_giro','=','area_giro_id_area_giro')
        ->join('consulta','usuario_id_consulta','=', 'usuario_id_empresa')
        //->where('usuario_id_consulta',$id)
        //->where('fecha_consulta',$Date)
        ->orWhereNull('usuario_id_consulta')
        ->get();

        //$NuevaConsulta = $Consulta->addSelect(DB::table('consulta')->where)
        return response()->json($Consulta);   


        //
      /*  $validacion = DB::table('consulta')
        ->where('usuario_id_consulta',$id)
        ->where('empresa_id_empresa',$id_empresa)
        ->where('fecha_consulta','=',$Date)
        ->first();

        if (is_null($validacion)) {    
            $NuevaConsulta = $Consulta->addSelect(DB::table('consulta')->where)
            return response()->json($Consulta);   
    
        }
        else{
               
            $NuevaConsulta = $Consulta->addSelect(DB::table('consulta')->where())
            return response()->json($Consulta); 
        }

        */

        }
}
