<?php




Route::middleware(['loggedIn','admin'])->group(function(){

    //Admin

    Route::get('/posts/edit/{id}', 'PostController@showUpdateView');

    Route::post('/post/update','PostController@update');

    Route::post('/post/delete','PostController@delete');

    Route::get('/admin/create-post', 'PostController@CreatePostView');

    Route::post('/store-post', 'PostController@store');
    


});


Route::middleware(['loggedIn'])->group(function(){

    //signed in user

    Route::post('/logout', 'UserController@logout');

    Route::post('/comment', 'CommentController@comment');
    
});    




Route::middleware(['notLoggedIn'])->group(function(){

    //guest

    Route::post('/login', 'UserController@login');  

    Route::get('/login', 'UserController@loginView');

    Route::get('/signup', 'UserController@signupView');

    Route::post('/signup', 'UserController@signup');

    Route::post('/first-login', 'UserController@firstLogin');


   
});



Route::get('/', 'PostController@showPosts');

Route::post('/social', 'SocialController@updateLinks');
Route::get('/social', 'SocialController@getLinks');
Route::get('/user-details', 'UserController@getUserDetails');

Route::get('/posts/{id}', 'PostController@showPost');
Route::get('/posts', 'PostController@getPosts');
Route::get('/posts/{id}/comments', 'PostController@getComments');
