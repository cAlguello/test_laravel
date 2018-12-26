<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\usuario;


class authController extends Controller
{
    public function confirmaUsuario(Request $request, $user){
        $Usuario = DB::table('usuario')->where('usuario', $user)->first();
        if($Usuario != null){
        return response()->json($Usuario);
        } 
        else{
            return null;
        }
    }

    public function addUser(Request $request){
        $usuario = $request->input('username');
        $password = $request->input('password');
        DB::insert('insert into usuario (usuario, password) values (?, ?)', [$usuario, $password]);
    }
}