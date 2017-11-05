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

Route::get('/', 'EntriesController@index')->name('home');
Route::get('/entries/new', 'EntriesController@new')->name('new_entry');
Route::post('/entries', 'EntriesController@create')->name('create_entry');
