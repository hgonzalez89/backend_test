<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //Las Reglas de validacion se encuentra dentro del request Requests\Auth\RegisterRequest
    public function register (RegisterRequest $request){
        try { 
            //Registro del usuario si todo esta correcto
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);
            //Creando token de autentificacion
            $token=JWTAuth::fromUser($user);
            
            return response()->json([
                'status' => true,
                'user' => $user,
                'token' => $token
            ],201);

        }catch(\Exception $exception) {
          return  response()->json([
                'status'    => false,
                'message'   => __($exception->getMessage())
            ]);
        }

       
    }

    //Las Reglas de validacion se encuentra dentro del request Requests\Auth\LoginRequest
    public function login(LoginRequest $request){
        $credentials = $request->only('email','password');
        try {
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json([
                    'status'    =>  false,
                    'message'   =>  'Credenciales Inválidas'
                ],400);
            }
        } catch ( JWTException $e) {
            return response()->json([
                'status'    =>  false,
                'message'   =>  'No se creo el token :'.$e->getMessage()
            ],500);
        }

        return response()->json(compact('token'));
    }
}
