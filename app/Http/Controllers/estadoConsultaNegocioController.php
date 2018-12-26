<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class estadoConsultaNegocioController extends Controller
{
   
    public function addNegocio(Request $request, $id){
        $Consulta = DB::table('consulta')
        ->where('id_consulta',$id)
        ->update(['estado_negocio' => 1]);
        return response()->json($Consulta);   
    }

    
}
