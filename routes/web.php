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

Route::get('/login', 'UserController@login');
Route::get('/', 'SocialController@main');

Route::get('/admin/create-post', 'PostController@CreatePostView');

Route::get('/signup', function () {
    return view('create-user');
});


Route::post('/logout', 'UserController@logout');

Route::post('/social', 'SocialController@updateLinks');

Route::post('/signup', 'UserController@signup');
Route::post('/first-login', 'UserController@firstLogin');

Route::post('/store-post', 'PostController@store');
