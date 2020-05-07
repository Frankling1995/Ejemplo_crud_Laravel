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


Route::get('/', 'Pagecontroller@index');



Route::group(['prefix' => 'Administrador'], function () {
Auth::routes();
Route::get('/', 'HomeController@index')->name('gestion');
Route::get('/crearP', 'PuclicacionesController@create')->name('Pcrear');
Route::post('/saveP', 'PuclicacionesController@store')->name('Psave');

});