<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $jsonAccept= $request->header("Accept");
        if($jsonAccept!=null && $jsonAccept=="application/json"){
            return $next($request);
        }
        // return redirect()->route("error",["message"=>"Debes enviar header: 'Accept: application/json'"]);
        return to_route("error",["message"=>"Debes enviar header: 'Accept: application/json'"]);
    }
}
