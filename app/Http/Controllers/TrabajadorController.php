<?php

namespace App\Http\Controllers;

use App\Http\Requests\pruebaRequest;
use App\Models\Trabajador;
use Illuminate\Http\Request;

class TrabajadorController extends Controller
{
    //

    public function index(){        
        // return response(Conductor::all())->
        // header("Content-Type","application/json")->header('Access-Control-Allow-Origin',"*");
        return response()->json(Trabajador::all());
    }
}
