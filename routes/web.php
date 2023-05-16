<?php

use App\Http\Controllers\ConductorController;
use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');    
    return redirect("login");
});

Route::get('login/', function () {
    return "Pagina de login";
});

Route::get('users/{id}/perfil/{idPerfil?}', function ($id,$idPerfil = null) {
    return "Entraste a al perfil del usuario ".$id."con id de perfil".($idPerfil== null ?" no definido":" ".$idPerfil);
});

Route::get('map', [MapController::class,"index"]);

Route::get("conductor",[ConductorController::class,"index"]);
