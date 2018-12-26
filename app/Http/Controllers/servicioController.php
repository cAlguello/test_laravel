<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\servicio;
use Illuminate\Support\Facades\DB;

class servicioController extends Controller
{
    public function verDatos(Request $request){ 
        $Servicio = servicio::all();
        //print_r($Usuario);
        //return response()->json(compact('Usuario'));
        return response()->json($Servicio);
    } 
    public function verServicios(Request $request, $id){ 
        $Servicio = DB::table('servicio')->where('usuario_id','=',$id)->get();
        //echo($request);
        //print_r($Usuario);
        //return response()->json(compact('Usuario'));
        return response()->json($Servicio);
    } 
}
