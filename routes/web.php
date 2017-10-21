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


Route::resource('article', 'ArticleController');

Route::resource('category', 'CategoryController', [
    'parameters' => [
        'show' => 'slug'
    ]
]);

Route::get('/profile', 'HomeController@profile')->name('user.show');



Auth::routes();


