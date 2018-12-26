<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class fetchData extends Controller
{
    public function verDatos(Request $request)
    {

        //test

        /*ORIGINAL
        $Data = DB::select('select id_empresa, nombre_empresa, direccion_empresa, fono_empresa, mail_empresa, id_giro, nombre_giro,
        id_area_giro, nombre_area_giro
        from empresa, giro, area_giro, empresa_has_giro
        where empresa_id_empresa = id_empresa and giro_id_giro = id_giro and area_giro_id_area_giro = id_area_giro ');
        return response()->json($Data);
         */
        $Consulta = DB::table('empresa_has_giro')
            ->join('empresa', 'id_empresa', '=', 'empresa_id_empresa')
            ->join('giro', 'id_giro', '=', 'giro_id_giro')
            ->join('area_giro', 'id_area_giro', '=', 'area_giro_id_area_giro')
            ->get();
        return response()->json($Consulta);

    }

    public function verProductos(Request $request)
    {

        $Consulta = DB::table('empresa_has_producto')
            ->join('empresa', 'id_empresa', '=', 'empresa_id_empresa_producto')
            ->join('producto', 'id_producto', '=', 'producto_id_producto')
            ->get();
        return response()->json($Consulta);

    }

    
}
