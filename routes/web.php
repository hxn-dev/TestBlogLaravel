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

// Homepage
Route::get('/', 'HomeController@index')->name('home');

// Rebinding logout on get
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


// Temporary.. Rebinding show with slug wildcard 
Route::get('article/{slug}', 'ArticleController@show')->where(['slug' => '[a-z -]+'])->name('article.show');
Route::get('category/{slug}', 'CategoryController@show')->where(['slug' => '[a-z -]+'])->name('category.show');

Route::resource('article', 'ArticleController', ['except' => ['show']]);
Route::resource('category', 'CategoryController', ['except' => ['show']]);


Route::get('/profile', 'HomeController@profile')->name('user.show');


Auth::routes();


