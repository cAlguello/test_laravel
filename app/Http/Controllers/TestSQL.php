<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestSQL extends Controller
{

    
    public function verDatos(Request $request){ 
        $Empresa = DB::connection('sqlsrv')->select('SELECT FROM dbo.DimProveedor WHERE IDSucursal = ?',['7759']);
        return response()->json($Empresa);   
    }
}
