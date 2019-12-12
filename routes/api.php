<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('throttle:60,1')->group(function () {
	
	Route::get('/', 'PageController@index');

	Route::get('story','StoryController@index');
	Route::get('story/{slug}','StoryController@show');

	Route::get('category', 'CategoryController@index');
	Route::get('category/{id}', 'CategoryController@show');

	Route::get('gallery','GalleryController@index');
	Route::get('gallery/{slug}','GalleryController@show');

	Route::get('society','SocietyController@index');
	Route::get('society/{slug}','SocietyController@show');

	Route::get('user','UserController@index');
	Route::get('user/{id}','UserController@show');
});
