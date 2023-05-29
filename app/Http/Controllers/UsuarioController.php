<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Http\Services\UsuarioService;
use App\Models\TipoUsuario;
use App\Models\Trabajador;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index(){
        return Usuario::all();
    }

    public function store(UsuarioRequest $request,UsuarioService $service){
        $request->validated();
        $usuario = new Usuario;
        $trabajador = new Trabajador;
        $trabajador->co_telefono = $request->input("telefono");
        $trabajador->co_nombre = $request->input("nombre");
        $trabajador->co_identificacion = $request->input("identificacion");
        $usuario->us_usuario = $request->input("identificacion");
        $usuario->us_correo = $request->input("correo");
        $usuario->us_contrasenia = $request->input("password");
        $usuario->us_token = "initialToken";
        $rol = TipoUsuario::find($request->input("rol"));        
        $usuario = $service->registrar($usuario,$trabajador,$rol);
        return response()->json([$usuario],201);
    }

    public function view(int $id){

    }

    public function update(){

    }

    public function destroy(){

    }

    public function login(Request $request,  UsuarioService $service){
        $usuario = $request->input("usuario");
        $contrasenia = $request->input("password");
        
        $jwt= $service->login($usuario,$contrasenia);

        return response()->json(["token"=>$jwt]);
    }

    public function logout(Request $request,  UsuarioService $service){
        $ok = $service->logout();
        return response()->json([],204);
    }
}
