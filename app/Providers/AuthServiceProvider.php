<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Exceptions\BearerException;
use App\Http\Services\UsuarioService;
use Exception;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\AuthenticationException;
class AuthServiceProvider extends ServiceProvider
{


    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(UsuarioService $usuarioService): void
    {        
        Auth::viaRequest("auth-custom",function (Request $request) use ($usuarioService){ 
            $jwt = $request->bearerToken();
            Log::debug("Bearer ".$jwt);
            if($jwt == null){
                throw new BearerException("Debe enviar header Authorization con jwt Bearer");
            }
            return $usuarioService->validarJWT($jwt);            
            
        } );
        
    }
}
