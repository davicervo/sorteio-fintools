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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// TODO - adicionar autenticação.
Route::prefix('brindes')->group(function () {
    Route::get('', 'BrindeController@index');
    Route::get('criar', 'BrindeController@create');
    Route::post('salvar', 'BrindeController@store');
    Route::get('{uid}/visualizar', 'BrindeController@show');
    Route::get('{uid}/editar', 'BrindeController@edit');
    Route::patch('{uid}/atualizar', 'BrindeController@update');
    Route::delete('{uid}/deletar', 'BrindeController@destroy');
});
