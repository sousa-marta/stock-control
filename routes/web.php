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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar','ProductController@viewForm');

//Para pegar as informações do formulário para salvar:
Route::post('/produtos/cadastrar','ProductController@create');

//Exibir formulário de atualização:
Route::get('/produtos/atualizar/{id?}','ProductController@viewFormUpdate');
//coloca ? para ser opcional
