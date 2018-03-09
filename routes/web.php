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

Route::get('/login', 'Auth\SocialAccountController@redirectToProvider')->name('login');
Route::get('/logout', 'Auth\SocialAccountController@logout')->name('logout');
Route::get('/callback', 'Auth\SocialAccountController@handleProviderCallback')->name('callback');

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::group(['middleware' => 'auth'], function() {
    Route::resource('entries', 'EntriesController');
    Route::post('/entries/{entry_id}/comments', 'CommentsController@create')->name('post_comment');
});