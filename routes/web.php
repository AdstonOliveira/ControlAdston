<?php

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

use App\Model\PessoaFisica;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ordem_servico', function(){
    return view('assistencia.ordem_servico');
})->name('os');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'cliente'], function () {
        Route::get("novo", "ClienteController@create")->name('cliente.novo');
        Route::post("novo", "ClienteController@store")->name('cliente.novo');
    });



});

Route::get('cidades/{id}', "CidadeController@cidadesEstado")->name('cidades.nome');
