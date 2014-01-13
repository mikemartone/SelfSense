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

// Route::get('/', function()
// {
// 	return View::make('landing');
// });

Route::get('/', 'HomeController@getIndex');
Route::post('login', 'HomeController@postLogin');

Route::group(array('before' => 'auth'), function()
{
	Route::get('login', 'HomeController@getLogin');

	Route::get('mood', 'MoodController@getIndex');
	Route::post('mood', 'MoodController@postMoodEntries');
	Route::post('mood/delete/{id}', array(
		'as' => 'mood.delete',
		'uses' => 'MoodController@postDelete'
		));
	
	Route::get('sleep', 'SleepController@getIndex');
	Route::post('sleep', 'SleepController@postSleepEntries');
});

// Event::listen('illuminate.query', function() {
//     print_r(func_get_args());
// });


//Route::resource('login', 'HomeController');

