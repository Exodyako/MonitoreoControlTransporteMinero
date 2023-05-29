<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TipoUsuario;
use App\Models\Trabajador;
use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        TipoUsuario::factory()->create(["tu_nombre"=>"Administrador"]);
        TipoUsuario::factory()->create(["tu_nombre"=>"Trabajador"]);
        $rol = TipoUsuario::where("tu_nombre","Administrador")->first(); 
        
        $usuario = new Usuario;
        $trabajador = new Trabajador;
        $trabajador->co_telefono = "1234567";
        $trabajador->co_nombre = "Alejandro Julian Sequeda Quiroga";
        $trabajador->co_identificacion = "1090";
        $usuario->us_usuario = "1090";
        $usuario->us_correo = "alejandrojulianprofesional@gmail.com";
        $usuario->us_contrasenia = Hash::make("admin");
        $usuario->us_token = "initialToken";        
        $trabajador->save();
        $usuario->rol()->associate($rol);
        $trabajador->usuario()->save($usuario);

        $usuario = new Usuario;
        $trabajador = new Trabajador;
        $trabajador->co_telefono = "1234567";
        $trabajador->co_nombre = "Admin Administrador Admin";
        $trabajador->co_identificacion = "109";
        $usuario->us_usuario = "109";
        $usuario->us_correo = "aalejandrojulianprofesional@gmail.com";
        $usuario->us_contrasenia = Hash::make("admin");
        $usuario->us_token = "initialToken";        
        $trabajador->save();
        $usuario->rol()->associate($rol);
        $trabajador->usuario()->save($usuario);
        
    }
}
