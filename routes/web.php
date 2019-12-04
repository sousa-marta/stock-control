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

//Rota para conectar e receber infos do google
Route::get('/login/google','Auth\LoginController@redirectToGoogle');
Route::get('/login/google/callback','Auth\LoginController@receiveDataGoogle');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar','ProductController@viewForm')->middleware('checkuser');

//Para pegar as informações do formulário para salvar:
Route::post('/produtos/cadastrar','ProductController@create');

//Exibir formulário de atualização:
Route::get('/produtos/atualizar/{id?}','ProductController@viewFormUpdate');
//coloca ? para ser opcional

//Para salvar informações do form de atualização
Route::post('/produtos/atualizar','ProductController@update');

Route::get('/produtos','ProductController@viewAllProducts');

Route::get('/produtos/deletar/{id?}','ProductController@delete'); // (?) opcional