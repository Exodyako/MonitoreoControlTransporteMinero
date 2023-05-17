<?php

use App\Http\Controllers\TrabajadorController;
use App\Http\Controllers\MapController;
use Illuminate\Http\Request;
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


Route::middleware(["api-camiones"])->group(function(){
    Route::get("trabajador",[TrabajadorController::class,"index"]);
});

Route::any('/error', function (Request $request) {
    return response()->json(["message"=>$request->input("message")],400);
})->name("error");