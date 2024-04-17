<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            ///Validamos si el Token ya expíro
            if($e instanceof TokenExpiredException){
                return response()->json([
                    'status' => false,
                    'message' => 'El token ha expirado'
                ],401);
            }
            ///Validamos si el Token es Inválido
            if($e instanceof TokenInvalidException){}
            return response()->json([
                'status' => false,
                'message' => 'Token Invalido'
            ],401);
            //Si el error es otro
            return response()->json([
                'status' => false,
                'message' => _($e->getMessage())
            ],401);
        }
        return $next($request);
    }
}
