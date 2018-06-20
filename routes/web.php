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

Route::resource('dias', 'DiaController');
Route::get('diaspesq', 'DiaController@pesq')
        ->name('dias.pesq');
Route::post('diasfiltro', 'DiaController@filtro')
        ->name('dias.filtro');

Route::resource('permanentes', 'PermanenteController');
Route::get('permanentespesq', 'PermanenteController@pesq')
        ->name('permanentes.pesq');
Route::post('permanentesfiltro', 'PermanenteController@filtro')
        ->name('permanentes.filtro');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
