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

Route::get('/', 'homeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

//Rotas do login

Auth::routes();

Route::post("login/entrar","Auth\LoginController@postEntrar");

Route::get("login/sair",function(){
    Auth::logout();
    session()->flush();
    return Redirect::to('/');
});

Route::get("/login/desativar/","UserController@Desativar");

// Rotas das funções

Route::get("/getstatus","filaController@getStatus");

Route::get("/getconfig","configController@getConfig");

Route::post("/setstatus","filaController@setStatus");

Route::get("/fila/deletar/{id}","filaController@deletar");

Route::get("/fila/voltar/{id}","filaController@voltar");

Route::get("/fila/subir/{id}","filaController@subir");

Route::get("/fila/adiantar/{id}","filaController@adiar");

//Rotas das configurações

Route::resource("/configuracao","configController");

Route::get("/testdb","configController@testeconexao");

Route::resource("/colaborador","colaboradorController");

Route::resource("/users","UserController");

//Rotas

Route::get("/atualizador","UploaderController@index");

Route::post("/atualizador","UploaderController@teste");