<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function (){

    Route::post('save', 'AuthController@save');
    Route::get('asignaturas', 'AsignaturaController@asignaturas');

    Route::group(['middleware' => 'jwt.auth'], function (){
        Route::get('asignatura/inscritas', 'AsignaturaController@inscritas');
        Route::get('asignatura/buscar', 'AsignaturaController@buscar');

        Route::post('asignatura', 'AsignaturaController@inscribir');
        Route::delete('asignatura', 'AsignaturaController@salir');
    });

});