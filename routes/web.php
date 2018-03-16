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

Route::get('/', 'blogController@index')->name("home");


Route::get('/blog/create', 'blogController@create');

Route::post('/blog/create', 'blogController@store');

Route::post('/blog/{blog}/comments', 'CommentsController@store');

Route::get('/blog/{blog}', 'blogController@show');

Route::get('/blog/{blog}/edit', 'blogController@edit');


// Auth::routes();

Route::get('/home', 'blogController@index')->name('home');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

 
Route::get('/login','SessionsController@create')->name("login");
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');
