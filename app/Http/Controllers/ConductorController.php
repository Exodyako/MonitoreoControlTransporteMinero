<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    //

    public function index(){
      
        return response(Conductor::all())->
        header("Content-Type","application/json")->header('Access-Control-Allow-Origin',"*");
    }
}
