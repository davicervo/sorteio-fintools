<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'sorteio'], function () {
    Route::get('{uid}', 'SorteioController@find');
});

Route::group(['prefix' => 'funcionarios'], function () {
    Route::get('chunk/{qtd}/{sorteioUid}', 'FuncionarioController@getByChunk');
});

Route::group(['prefix' => 'vencedores'], function () {
    Route::get('', 'ApiVencedorController@index');
    Route::get('{sorteioUid}/visualizar', 'ApiVencedorController@show');
});

Route::group(['prefix' => 'brindes'], function () {
    Route::get('/{sorteio_uid}', 'BrindeController@listForSelect');
    Route::get('ganhador/{brindeUid}', 'BrindeController@adicionarGanhador');
});
