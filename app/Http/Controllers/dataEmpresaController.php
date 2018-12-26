<?php

namespace App\Http\Controllers;

use App\empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dataEmpresaController extends Controller
{
    public function verDatos(Request $request)
    {
        $Empresa = empresa::all();
        return response()->json($Empresa);
    }

    public function verProductosEmpresa(Request $request, $id)
    {
        $Data = DB::table('empresa_has_producto')->join('producto', 'id_producto', '=', 'producto_id_producto')->select('nombre_producto', 'id_producto')->where('empresa_id_empresa_producto', $id)->get();
        return response()->json($Data);
    }

    public function addProductoEmpresa(Request $request)
    {
        $id_producto = $request->input('id_producto');
        $id_empresa = $request->input('id_empresa_producto');
        $id_rubro = $request->input('rubro_id_rubro');

        $consulta = DB::table('empresa_has_producto')
            ->where('empresa_id_empresa_producto', '=', $id_empresa)
            ->where('producto_id_producto', '=', $id_producto)
            ->first();
        if (is_null($consulta)) {
            DB::insert('insert into empresa_has_producto (empresa_id_empresa_producto, producto_id_producto, producto_rubro_id_rubro) values (?, ?,?)', [$id_empresa, $id_producto, $id_rubro]);
        }
    }

    public function removeProductoEmpresa(Request $request)
    {
        $id_producto = $request->input('id_producto');
        $id_empresa = $request->input('id_empresa_producto');
        $productoEmpresa = DB::table('empresa_has_producto')->where('empresa_id_empresa_producto', $id_empresa)->where('producto_id_producto', $id_producto)->delete();

    }

    public function contarEmpresas(Request $request)
    {
        $Consulta = empresa::count();
        return response()->json($Consulta);
    }
    public function actualizaDatos(Request $request)
    {
        $nombre_empresa = $request->input('nombre_empresa');
        $direccion_empresa = $request->input('direccion_empresa');
        $fono_empresa = $request->input('fono_empresa');
        $mail_empresa = $request->input('mail_empresa');
        $usuario_id = $request->input('usuario_id');

        $empresa = DB::table('empresa')->where('usuario_id_empresa', $usuario_id)->first();
        if (is_null($empresa)) {
            DB::insert('insert into empresa (nombre_empresa, direccion_empresa, fono_empresa, mail_empresa, usuario_id_empresaw ) values (?, ?, ?, ?, ?)',
                [$nombre_empresa, $direccion_empresa, $fono_empresa, $mail_empresa, $usuario_id]);
        } else {
            DB::table('empresa')
                ->where('usuario_id', $usuario_id)
                ->update(['nombre_empresa' => $nombre_empresa, 'direccion_empresa' => $direccion_empresa, 'fono_empresa' => $fono_empresa, 'mail_empresa' => $mail_empresa]);
        }

        //
        /* $newUser = \App\empresa::updateOrCreate([

        //Add unique field combo to match here
        //For example, perhaps you only want one entry per user:

        'usuario_id'   => $request->get('usuario_id'),
        ],[
        //
        //$id_empresa = $request->input('id_empresa');

        //
        //'id_empresa'     => $request->get('about'),
        'nombre_empresa' => $request->get('nombre_empresa'),
        'direccion_empresa'    => $request->get("direccion_empresa"),
        'fono_empresa'   => $request->get('fono_empresa'),
        'mail_empresa'       => $request->get('mail_empresa'),

        ]);*/
        //
        /*     $flight = DB::updateOrCreate(
    ['departure' => 'Oakland', 'destination' => 'San Diego'],
    ['price' => 99]
    );

    $Data = DB::table('empresa')
    ->where('id', 1)
    ->update(['votes' => 1]);*/
    }

    /*
DB::table('users')
->where('id', 1)
->update(['votes' => 1]);

public function addUser(Request $request){
$usuario = $request->input('username');
$password = $request->input('password');
DB::insert('insert into usuario (usuario, password) values (?, ?)', [$usuario, $password]);
}
 */
}
