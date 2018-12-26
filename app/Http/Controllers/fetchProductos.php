<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class fetchProductos extends Controller
{
    public function verDatos(Request $request){ 
        $Consulta = DB::table('producto')
        ->join('rubro','id_rubro','=','rubro_id_rubro')
        ->get();
        return response()->json($Consulta);   
        }
}
