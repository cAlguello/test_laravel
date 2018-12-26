<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\usuario;


class testController1 extends Controller
{
    public function test1(Request $request){
        echo "Hola";
    }
    
    public function verDatos(Request $request){ 
        $Usuario = usuario::all();
        //print_r($Usuario);
        //return response()->json(compact('Usuario'));
        return response()->json($Usuario);
    }  
}
