<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MapController extends Controller
{
    //
    // public function __invoke(String $z=null):string
    // {
    //     return "Estoy cargando el mapa".$z;
    // }

    public function index() : View{
        return view("map.index");
    }
}
