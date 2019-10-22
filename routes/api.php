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
	Route::get('stories','StoryController@index');

	Route::get('story/{id}','StoryController@show');

	Route::get('storyImage/{storyId}','ImageController@show');

	Route::get('gallery','galleryController@index');

	Route::get('gallery/{slug}','galleryController@show');

	Route::get('societies','SocietyController@index');

	Route::get('society/{id}','SocietyController@show');
});
