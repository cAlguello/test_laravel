<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultaController extends Controller
{
    public function verDatos(Request $request, $id)
    {
        $Consulta = DB::table('consulta')
            ->join('empresa', 'empresa_id_empresa', '=', 'id_empresa')
            ->where('usuario_id_consulta', $id)
            ->where('estado_consulta', 1)->get();
        return response()->json($Consulta);
    }
    public function addConsulta2(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $id_empresa = $request->input('empresa_id_empresa');
        $fecha_consulta = $request->input('fecha_consulta');
        $solicitud_consulta = $request->input('solicitud_consulta');
        DB::insert('insert into consulta (usuario_id_consulta, empresa_id_empresa, fecha_consulta, solicitud_consulta) values (?, ?, ?, ?)', [$usuario_id, $id_empresa, $fecha_consulta, $solicitud_consulta]);
    }
    public function addConsulta(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $id_empresa = $request->input('empresa_id_empresa');
        $fecha_consulta = $request->input('fecha_consulta');
        $estado_consulta = $request->input('estado');
        //fin real
        //test

        $validacion = DB::table('consulta')
            ->where('usuario_id_consulta', $usuario_id)
            ->where('empresa_id_empresa', $id_empresa)
            ->where('fecha_consulta', '=', $fecha_consulta)
            ->first();
//
        //test
        if (is_null($validacion)) {
            DB::insert('insert into consulta (usuario_id_consulta, empresa_id_empresa, fecha_consulta, estado_consulta) values (?, ?, ?, ?)', [$usuario_id, $id_empresa, $fecha_consulta, $estado_consulta]);

        } else {
            DB::table('consulta')
                ->where('usuario_id_consulta', $usuario_id)
                ->where('empresa_id_empresa', $id_empresa)
                ->where('fecha_consulta', '=', $fecha_consulta)
                ->update(['estado_consulta' => $estado_consulta]);

        }
//test

        //  DB::insert('insert into consulta (usuario_id_consulta, empresa_id_empresa, fecha_consulta) values (?, ?, ?)', [$usuario_id, $id_empresa, $fecha_consulta]);
    }

    public function testArray(Request $request)
    {
        $data = $request->all();
        DB::table('pruebasarray')->insert($data);
    }
}
