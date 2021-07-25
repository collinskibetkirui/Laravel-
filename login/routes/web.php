<?php 

use Illuminate\Http\Request;

// After Login
Route::group(['middleware'=>['loginCheck']],function(){
	Route::get('logout','Profiles@logout');
	Route::get('profiles','Profiles@profile');
	Route::get('/','WelcomeController@home');
	Route::get('flash','Profiles@profile');

	// Database
	Route::get('/db','Profiles@db');
	Route::get('/join','Profiles@join');

	// File upload
	Route::view('fileupload','profile');
	Route::post('fileupload','Profiles@fileupload');

	//Model View
	Route::get('/product','productController@index');

	//Resource Controller
	Route::resource('post','PostController');
});

// Before Login
Route::group(['middleware'=>['logoutCheck']],function(){
	Route::view('login','login');
	Route::post('login','Profiles@login');
});

