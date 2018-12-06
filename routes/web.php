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

Route::get('/', 'PostsController@index')
	->name('posts.index');
	
Route::post('/posts', 'PostsController@store')
	->name('posts.store');

Route::delete('/posts/{post}', 'PostsController@destroy')
	->name('posts.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
