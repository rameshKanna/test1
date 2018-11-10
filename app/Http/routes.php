<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('curl', 'PagesController@curl');
Route::get('curl1', 'PagesController@curl1');
Route::get('curl_test', 'PagesController@curl_test');
Route::get('location', 'PagesController@location');
Route::get('get_data', 'PagesController@get_data');
Route::get('curl_qrcode_count', 'PagesController@curl_qrcode_count');


Route::resource('tasks', 'TasksController');

Route::get('/posts',function(){

	\App\Post::create([
		'title' => 'home',
    	'body' => 'Test'

		]);

});