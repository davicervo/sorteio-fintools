<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( ['prefix' => 'sorteio'], function () {
    Route::get('{uid}', 'SorteioController@find');
});

Route::group( ['prefix' => 'funcionarios'], function () {
    Route::get('', 'FuncionarioController@index');
    Route::get('{uid}', 'FuncionarioController@find');
    Route::post('', 'FuncionarioController@find@store');
    Route::put('{uid}', 'FuncionarioController@update');
    Route::get('chunk/{qtd}/{sorteioUid}', 'FuncionarioController@getByChunk');
});

Route::group([ 'prefix' => 'vencedores'], function () {
    Route::get('', 'ApiVencedorController@index');
    Route::get('{sorteioUid}/visualizar', 'ApiVencedorController@show');
});

Route::group([ 'prefix' => 'brindes'], function () {
    Route::get('/{sorteio_uid}', 'BrindeController@listForSelect');
    Route::get('ganhador/{brindeUid}', 'BrindeController@adicionarGanhador');

});
