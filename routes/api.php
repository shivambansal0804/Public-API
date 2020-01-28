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

	Route::get('edition','EditionController@index');
	Route::get('edition/{id}','EditionController@show');

	Route::get('instagram','InstagramController@index');
	Route::get('instagram/post','InstagramController@postIndex');
	Route::get('instagram/post/{id}','InstagramController@postShow');

	Route::get('facebook','FacebookController@index');
	Route::get('facebook/post','FacebookController@postindex');
	Route::get('facebook/post/{id}','FacebookController@postShow');

	Route::get('device', 'DeviceTokenController@index');
	Route::post('device', 'DeviceTokenController@store');

	Route::get('/subscriber', 'SubscriberController@index');
	Route::post('/subscriber', 'SubscriberController@store');

	Route::get('/notification', 'NotificationController@index');


});
