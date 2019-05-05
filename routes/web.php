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

Route::resource('/contato', 'ContatoController');   /* php artisan make:controller ContatoController */
Route::resource('/produtos', 'ProdutosController'); /* php artisan make:controller ProdutosController */
Route::post('/produtos/busca', 'ProdutosController@busca'); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
