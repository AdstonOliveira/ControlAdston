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

use App\Cliente;
use App\Http\Resources\ClienteOption as Resource;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("clientes_json/{nome}", "AjaxController@selectClientes")->name("option_cliente");

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'cliente'], function () {
        Route::get("novo", "ClienteController@create")->name('cliente.novo');
        Route::post("novo", "ClienteController@store")->name('cliente.novo');
        Route::get("lista", "ClienteController@index")->name('cliente.lista');
        Route::get("editar/{id}", "ClienteController@show")->name("cliente.editar");
        Route::put("editar/{id}","CidadeController@update")->name("cliente.editar");
        Route::delete('delete/{id}', "ClienteController@destroy")->name("cliente.delete");
    });

    Route::group(['prefix' => 'os'], function () {
        Route::get("lista", "OrdemServicoController@index")->name("os");
        Route::get("novo", "OrdemServicoController@create")->name("os.novo");
        Route::post("novo", "OrdemServicoController@store")->name("os.novo");
    });



});

Route::get('cidades/{id}', "CidadeController@cidadesEstado")->name('cidades.nome');
