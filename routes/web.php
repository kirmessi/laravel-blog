<?php

//User Routes
Route::group(['namespace'=>'User'],function(){
	Route::get('/','HomeController@index');
	Route::get('post/{post}','PostController@post')->name('post');

	Route::get('post/tag/{tag}','HomeController@tag')->name('tag');
	Route::get('post/category/{category}','HomeController@category')->name('category');
});
//Admin Routes
Route::group(['namespace'=>'Admin'],function(){

	//HomeAdmin Route

	Route::get('admin-panel/home','AdminHomeController@index')->name('admin.home');

	//Post Routes

	Route::resource('admin-panel/post','PostController');

	//Tag Routes

	Route::resource('admin-panel/tag','TagController');

	//Category Routes

	Route::resource('admin-panel/category','CategoryController');

	//User Routes

	Route::resource('admin-panel/user','UserController');

});




