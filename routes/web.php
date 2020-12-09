<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false, 'reset' => false, 'verify' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('brindes')->group(function () {
        Route::get('', 'BrindeController@index')->name('brindes.index');
        Route::get('criar', 'BrindeController@create')->name('brindes.create');
        Route::post('salvar', 'BrindeController@store');
        Route::get('{uid}/visualizar', 'BrindeController@show')->name('brindes.show');
        Route::get('{uid}/editar', 'BrindeController@edit')->name('brindes.edit');
        Route::patch('{uid}/atualizar', 'BrindeController@update');
        Route::get('{uid}/deletar', 'BrindeController@destroy')->name('brindes.destroy');
    });

    Route::prefix('usuarios')->group(function () {
        Route::get('', 'UsuarioController@index')->name('usuarios.index');
        Route::get('criar', 'UsuarioController@create')->name('usuarios.create');
        Route::post('salvar', 'UsuarioController@store')->name('usuarios.store');
        Route::get('{id}/visualizar', 'UsuarioController@show')->name('usuarios.show');
        Route::get('{id}/editar', 'UsuarioController@edit')->name('usuarios.edit');
        Route::patch('{id}/atualizar', 'UsuarioController@update')->name('usuarios.update');
        Route::get('{id}/deletar', 'UsuarioController@destroy')->name('usuarios.destroy');
    });

    Route::prefix('sorteios')->group(function () {
        Route::get('', 'SorteioController@index')->name('sorteios.index');
        Route::get('criar', 'SorteioController@create')->name('sorteios.create');
        Route::post('salvar', 'SorteioController@store')->name('sorteios.store');
        Route::get('{sorteio}/visualizar', 'SorteioController@show')->name('sorteios.show');
        Route::get('{sorteio}/editar', 'SorteioController@edit')->name('sorteios.edit');
        Route::patch('{sorteio}/atualizar', 'SorteioController@update')->name('sorteios.update');
        Route::get('{sorteio}/deletar', 'SorteioController@destroy')->name('sorteios.destroy');
    });
});
