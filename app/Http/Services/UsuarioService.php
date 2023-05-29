<?php

namespace App\Http\Services;

use App\Models\TipoUsuario;
use App\Models\Trabajador;
use App\Models\Usuario;
use Carbon\Carbon;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UsuarioService{

    
    public function validarJWT(?string $jwt){
        $key = config("jwt.JWT_SECRET");
        $decoded = JWT::decode($jwt,new Key($key,"HS256"));
        LOG::info(json_encode((array)$decoded));
        $idUsuario=$decoded->id;
        $token=$decoded->hash;
        $rol = $decoded->rol;
        $usuario = Usuario::where([["us_token",$token],["us_id",$idUsuario],["us_tipo",$rol]])->first();
        
        return $usuario;
    }

    public function registrar(Usuario $usuario,Trabajador $trabajador, TipoUsuario $rol){
        $usuario->us_contrasenia = Hash::make($usuario->us_contrasenia);
        DB::transaction(function () use ($usuario,$trabajador,$rol){
            $trabajador->save();
            $usuario->rol()->associate($rol);
            $trabajador->usuario()->save($usuario);
        });

        $usuario->trabajador;
        return $usuario;
    }

    public function login(string $usuario,string $password):?string{
        $usuario = Usuario::where("us_usuario",$usuario)->orWhere("us_correo",$usuario)->first();
        $jwt = null;
        if($usuario != null && Hash::check($password,$usuario->us_contrasenia)){
            $key = config("jwt.JWT_SECRET");
            $hash= Hash::make(Carbon::now());
            $payload = [
                "iat"  => time(),
                "exp"  => (time() + (60*60*24)),
                "hash" => $hash,
                "id"   => $usuario->us_id,
                "rol"  => $usuario->rol->tu_id,
            ];
            $jwt = JWT::encode($payload, $key, "HS256");
            $usuario->us_token = $hash;
            $usuario->save();
            Log::info("UsuarioService-login: jwt: " . $jwt);
        }        
        return $jwt;
    }

    public function logout(){
        $usuario = Auth::user();
        $user = Usuario::find($usuario->us_id);
        $user->us_token = Hash::make(Carbon::now());
        $user->save();
        return true;
    }
        
}