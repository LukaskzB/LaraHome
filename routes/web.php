<?php

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

Route::get('/', 'App\Http\Controllers\UsuarioController@index');
Route::get('/sair', 'App\Http\Controllers\UsuarioController@sair');
Route::get('/cadastro', 'App\Http\Controllers\UsuarioController@indexCadastro');
Route::post('/logar', 'App\Http\Controllers\UsuarioController@login');
Route::post('/cadastrar', 'App\Http\Controllers\UsuarioController@cadastrar');

Route::group(['middleware' => ['autenticacao']], function () {

    Route::get('/perfil', 'App\Http\Controllers\UsuarioController@perfil');
    Route::post('/perfil/nome/{id}', 'App\Http\Controllers\UsuarioController@atualizarNome');
    Route::post('/perfil/email/{id}', 'App\Http\Controllers\UsuarioController@atualizarEmail');
    Route::post('/perfil/senha/{id}', 'App\Http\Controllers\UsuarioController@atualizarSenha');
    Route::post('/perfil/excluir/{id}', 'App\Http\Controllers\UsuarioController@excluirConta');

    Route::get('/alugueis', 'App\Http\Controllers\AluguelController@index');
    Route::post('/alugueis/pesquisar', 'App\Http\Controllers\AluguelController@search');
    Route::get('/alugueis/cadastrar', 'App\Http\Controllers\AluguelController@cadastrar');
    Route::post('/alugueis/store', 'App\Http\Controllers\AluguelController@store');
    Route::get('/alugueis/editar/{id}', 'App\Http\Controllers\AluguelController@editar');
    Route::post('/alugueis/atualizar/{id}', 'App\Http\Controllers\AluguelController@atualizar');
    Route::get('/alugueis/excluir/{id}', 'App\Http\Controllers\AluguelController@excluir');

    Route::get('/vendas', 'App\Http\Controllers\VendaController@index');
    Route::post('/vendas/pesquisar', 'App\Http\Controllers\VendaController@search');
    Route::get('/vendas/cadastrar', 'App\Http\Controllers\VendaController@cadastrar');
    Route::post('/vendas/store', 'App\Http\Controllers\VendaController@store');
    Route::get('/vendas/editar/{id}', 'App\Http\Controllers\VendaController@editar');
    Route::post('/vendas/atualizar/{id}', 'App\Http\Controllers\VendaController@atualizar');
    Route::get('/vendas/excluir/{id}', 'App\Http\Controllers\VendaController@excluir');

    Route::get('/pdf/vendas', 'App\Http\Controllers\UsuarioController@PDFVenda');
    Route::get('/pdf/alugueis', 'App\Http\Controllers\UsuarioController@PDFAluguel');
});
