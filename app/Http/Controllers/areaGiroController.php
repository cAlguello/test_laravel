<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\areaGiro;
use Illuminate\Support\Facades\DB;

class areaGiroController extends Controller
{
    public function verDatos(Request $request){ 
        $AreaGiro = areagiro::all();
        return response()->json($AreaGiro);   
    }
}
