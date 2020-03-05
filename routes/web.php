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

//Muestra la vista del formulario para introducir el codigo
Route::get('/code','CodeController@index');

//Ruta para aguardar el codigo
Route::post('/code','CodeController@storeLocal')->name('store.local');

//Ruta 'en la nube' para guardar el codigo depues de guardar en local
Route::post('/code_after_save', function () {
    return 'url de post despues de guardar en local';
})->name('after');