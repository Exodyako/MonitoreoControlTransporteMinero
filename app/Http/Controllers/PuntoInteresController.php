<?php

namespace App\Http\Controllers;

use App\Http\Requests\PuntoInteresRequest;
use App\Models\Coordenada;
use App\Models\PuntoInteres;
use Illuminate\Support\Facades\DB;

use MatanYadaev\EloquentSpatial\Objects\Point;

class PuntoInteresController extends Controller
{
    
    public function index(){
        $puntosInteres =  PuntoInteres::all();
        $puntosInteres->map(fn($ele)=>$ele->coordenadas);        
        return response()->json($puntosInteres);      
    }

    public function show($id){
        return response()->json(PuntoInteres::find($id));
    }

    public function store(PuntoInteresRequest $request){
        $request->validated();
        
        $puntoInteres = new PuntoInteres;
        DB::transaction(function () use ($puntoInteres,$request) {
           
            $puntoInteres->pi_nombre = $request->input("nombre");
            $puntoInteres->pi_direccion = $request->input("direccion");
            $puntoInteres->pi_icono = "hasH-icono";                
            $puntoInteres->save();
            $coordenada = new Coordenada;            
            $latitud=$request->input("latitud");
            $longitud=$request->input("longitud");
            $coordenada->coo_coordenada = new Point($latitud,$longitud);
            $coordenada->coo_activo = 0;
            $puntoInteres->coordenadas()->save($coordenada);            
        });
        return response()->json([$puntoInteres],201);
      
    }

    public function update(){
        
        return response()->json(["message"=>"actualizando"]);

    }    

    public function destroy($id){
        $puntoInteres = PuntoInteres::find(1);
        $puntoInteres->delete();
        return response()->json(null,204);
    }
}
