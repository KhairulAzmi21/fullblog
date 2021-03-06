<?php

/*
|--------------------------------------------------------------------------
| Web Routes
composer require fzaninotto/faker dev-master
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

Auth::routes();

Route::resource('posts', 'PostController');

Route::resource(
    '/comments',
    'CommentController',
    ['only' => ['store']]
);

Route::get('/home', 'HomeController@index')->name('home');
