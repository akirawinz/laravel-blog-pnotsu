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



// Route::get('/login','LoginController@showLoginForm')->name('login');
// Route::post('/login','LoginController@submitLoginForm')->name('login.submit');
Auth::routes();

// blog
Route::get('/blog', 'HomeController@index')->name('blog');
Route::get('/blog/create', 'HomeController@create')->name('create');
Route::post('/blog/store', 'HomeController@store')->name('store');
Route::get('/blog/show/{id}', 'HomeController@show')->name('show');

