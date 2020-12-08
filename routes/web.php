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

    Route::resource('sorteios', 'SorteioController');
});
