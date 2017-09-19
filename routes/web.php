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

Route::get('/', 'AudioController@index')->name('index');
Route::get('/palabras/all', 'AudioController@palabrasAll')->name('palabrasAll');
Route::get('/palabras', 'AudioController@palabras')->name('palabras');
Route::get('/palabras', 'AudioController@palabras')->name('palabras');

Route::post('/create/palabras', 'AudioController@create')->name('create');
