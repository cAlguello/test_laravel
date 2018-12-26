<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class girosUnicosEmpresa extends Controller
{
    public function verDatos(Request $request, $id){
        $Data = DB::table('empresa_has_giro')->join('giro','id_giro','=','giro_id_giro')->select('giro_id_giro','nombre_giro')->where('empresa_id_empresa', $id)->get();
        return response()->json($Data);
        }
        
        //        
        public function remueveDatos(Request $request){ 
            $empresa_id_empresa = $request->input('empresa_id_empresa');
            $giro_id_giro = $request->input('giro_id_giro');
            $GiroEmpresa = DB::table('empresa_has_giro')->where( 'empresa_id_empresa', $empresa_id_empresa)->where('giro_id_giro', $giro_id_giro)->delete();        
             
        }

    }  

