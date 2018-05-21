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


Route::get('/test', 'IniciativaController@index');

//CrearIniciativa post

// Editar post nombre,descripcion,pdct_oesperado
// Eliminar delete id
Route::resource('/iniciativa', 'IniciativaController')->only(['update','destroy']);

// Validacion_dic post true,false
Route::get('/valida_dic', 'IniciativaController@validar_dic')->name('iniciativa.validar_dic');

// Validacion_ei get post true,false
Route::get('/valida_ei', 'IniciativaController@validar_ei')->name('iniciativa.validar_ei');

// Publicar true,false
Route::get('/publicar', 'IniciativaController@publicar')->name('iniciativa.publicar');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
