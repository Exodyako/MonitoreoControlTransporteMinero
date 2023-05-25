<?php

namespace App\Http\Controllers;

use App\Http\Requests\pruebaRequest;
use App\Http\Requests\TrabajadorRequest;
use App\Models\Trabajador;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TrabajadorController extends Controller
{
    //

    public function index(){                      
        return response()->json(Trabajador::all());
    }

    public function view($id){
        return response()->json(Trabajador::find($id));
    }

    public function store(TrabajadorRequest $request):JsonResponse{
        $request->validated();        
        $trabajador = new Trabajador;
        $trabajador->co_nombre = $request->input("nombre");
        $trabajador->co_telefono=$request->input("telefono");
        $trabajador->co_identificacion=$request->input("identificacion");
        
        $trabajador->save();
        return response()->json($trabajador);
    }
    public function update(){

    }
    public function destroy(){

    }
}
