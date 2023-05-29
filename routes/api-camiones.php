<?php
use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\PuntoInteresController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(["api-camiones","auth-custom"])->group(function(){
    //login
    Route::get("isLogged",fn()=>response()->json(["message",true],200));
    Route::put("logout",[UsuarioController::class,"logout"]);

    //Punto interes rutas
    Route::get("punto-interes",[PuntoInteresController::class,"index"]);
    Route::get("punto-interes/{id}",[PuntoInteresController::class,"show"]);
    Route::post("punto-interes",[PuntoInteresController::class,"store"]);
    Route::put("punto-interes",[PuntoInteresController::class,"update"]);
    Route::delete("punto-interes/{id}",[PuntoInteresController::class,"destroy"]);

    //Trabajador rutas
    Route::get("trabajador",[TrabajadorController::class,"index"]);
    Route::get("trabajador/{id}",[TrabajadorController::class,"view"]);
    Route::post("trabajador",[TrabajadorController::class,"store"]);
    Route::put("trabajador",[TrabajadorController::class,"update"]);  
    
    Route::post("trabajador/usuario",[UsuarioController::class,"store"]);
});

Route::post("login",[UsuarioController::class,"login"]);
// Route::any('/error', function (Request $request) {
//     return response()->json(["message"=>$request->input("message")],400);
// })->name("error");