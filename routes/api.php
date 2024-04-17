<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');



//Rutas protegidas
Route::middleware('verify.jwt')->group(function(){
    ////Rutas de Productos
    Route::get('/products/index', 'ProductController@index');//Consulta Todos
    Route::post('/products/insert', 'ProductController@store');//Inserta Productos
    Route::put('/products/update/{id}', 'ProductController@update');//Actualiza Productos
    Route::post('/products/delete/{id}', 'ProductController@destroy');//Elimina Productos
});

