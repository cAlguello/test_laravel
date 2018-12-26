<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\giroEmpresa;
use Illuminate\Support\Facades\DB;

class giroEmpresaController extends Controller
{
    public function verDatos(Request $request){ 
        $GiroEmpresa = giroEmpresa::all();
        return response()->json($GiroEmpresa);   
    }
}
