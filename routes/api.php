<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( ['prefix' => 'funcionarios'], function () {
    Route::get('', 'FuncionarioController@index');
    Route::get('{uid}', 'FuncionarioController@find');
    Route::post('', 'FuncionarioController@find@store');
    Route::put('{uid}', 'FuncionarioController@update');
    Route::get('chunk/{qtd}', 'FuncionarioController@getByChunk');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'vencedores'], function () {
    Route::get('', 'ApiVencedorController@index');
});
