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
Route::get("formas_pagto/{tipo_id}", "AjaxController@formaPagto")->name("formas_pagto");

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'cliente'], function () {
        Route::get('/', "ClienteController@index")->name('Central Clientes');
        Route::get("novo", "ClienteController@create")->name('cliente.novo');
        Route::post("novo", "ClienteController@store")->name('cliente.novo');
        Route::get("editar/{id}", "ClienteController@show")->name("cliente.editar");
        Route::put("editar/{id}","CidadeController@update")->name("cliente.editar");
        Route::delete('delete/{id}', "ClienteController@destroy")->name("cliente.delete");
        Route::get("detalhes/{id}","ClienteController@detalhes")->name("cliente.detalhes");

    });

    Route::group(['prefix' => 'os'], function () {
        Route::get("/", "OrdemServicoController@index")->name("Central OS");
        Route::get("novo", "OrdemServicoController@create")->name("os.novo");
        Route::post("novo", "OrdemServicoController@store")->name("os.novo");
        Route::get("edit/{id}", "OrdemServicoController@edit")->name("os.edit");
        Route::put("edit/{id}", "OrdemServicoController@update")->name("os.edit");
        Route::delete("delete", "OrdemServicoController@destroy")->name("os.delete");
        //Ajax Route 
        Route::get('ajax/status/{id_os}/{id_status}', "AjaxController@updateStatus")->name('ajax.os.status');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/',"DividaController@index")->name("Central Financeiro");
        Route::get('pagar/novo',"DividaController@create")->name("admin.divida.novo");
    });

    Route::group(['prefix' => 'vendas'], function () {
        Route::get("/", "OrcamentoController@index")->name("Central Vendas");
        Route::get("novo", "OrcamentoController@create")->name("orcamento.novo");
    });

    Route::group(['prefix' => 'produtos'], function () {
        Route::get("/", "ProdutoController@index")->name("Central Produtos");
        Route::get("/novo", "ProdutoController@create")->name("produto.novo");
        Route::post("/novo", "ProdutoController@store")->name("produto.novo");
    });



});

Route::get('cidades/{id}', "CidadeController@cidadesEstado")->name('cidades.nome');
Route::post('equipamento_ajax', "EquipamentoController@store")->name("equip.store");
Route::get('equipamento_ajax/{cliente_id?}', "EquipamentoController@equipCliente")->name("equip.lista");
