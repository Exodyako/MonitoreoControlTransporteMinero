<?php

namespace App\Exceptions;

use Firebase\JWT\ExpiredException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

      /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {     
        $this->renderable(function(ExpiredException $e){            
            return response()->json(["message"=>"el token ha expirado"],401);
        });
        $this->renderable(function(BearerException $e){            
            return response()->json(["message"=>$e->getMessage()],401);
        });
        
        $this->reportable(function (Throwable $e) {
            //
        });
       
    }
}
