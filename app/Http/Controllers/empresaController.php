<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\empresa;
use Illuminate\Support\Facades\DB;

class empresaController extends Controller
{
    public function verDatos(Request $request, $id){
        $Empresa = DB::table('empresa')->where('id_empresa', $id)->first();
        return response()->json($Empresa);   
    }

    public function verDatos2(Request $request)
    {
        $Consulta = DB::table('empresa_has_giro')
            ->join('empresa', 'id_empresa', '=', 'empresa_id_empresa')
            ->join('giro', 'id_giro', '=', 'giro_id_giro')
            ->join('area_giro', 'id_area_giro', '=', 'area_giro_id_area_giro')
            ->get();
        return response()->json($Consulta);
    }
}