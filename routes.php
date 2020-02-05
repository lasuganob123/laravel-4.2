<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','PagesController@index');

Route::get('/about','PagesController@about');

Route::get('/login','PagesController@login');

Route::patch('/login/enter','PagesController@postSignin');

Route::get('/register','PagesController@register');

Route::post('/register/save','PagesController@postCreate');

Route::get('/logout', 'PagesController@getLogout');

Route::group(array('before' => 'auth'), function()
{
	Route::resource('users', 'UserController');

	Route::resource('blogs','BlogController');
	
	Route::any("/blogs/{slug}", array(
		"as"   => "blogs",
		"uses" => "BlogController@show"
	));
});

//Route::get('users',array('before'=>'auth'),'UserController@index');
