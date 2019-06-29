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

Route::post('/login', 'UserController@login');
Route::get('/login', 'UserController@loginView');

Route::get('/', 'PostController@getPosts');

Route::get('/admin/create-post', 'PostController@CreatePostView');

Route::get('/signup', 'UserController@signupView');


Route::post('/logout', 'UserController@logout');

Route::post('/social', 'SocialController@updateLinks');

Route::post('/signup', 'UserController@signup');
Route::post('/first-login', 'UserController@firstLogin');

Route::post('/store-post', 'PostController@store');

Route::post('/comment', 'CommentController@comment');

Route::get('/posts/{id}', 'PostController@showPost');