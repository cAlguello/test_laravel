<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\giro;
use Illuminate\Support\Facades\DB;


class giroController extends Controller
{
    public function verDatos(Request $request){ 
        $Giro = giro::all();
        return response()->json($Giro);   
    }

    public function addGiroEmpresa(Request $request){
        $id_giro = $request->input('id_giro');
        $id_empresa = $request->input('empresa_id_empresa');
        DB::insert('insert into empresa_has_giro (empresa_id_empresa, giro_id_giro) values (?, ?)', [$id_empresa, $id_giro]);
    }

    


}
