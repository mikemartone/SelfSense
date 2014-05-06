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
Route::get('logout', 'HomeController@getLogout');

Route::get('registration', 'RegistrationController@getIndex');
Route::post('registration', 'RegistrationController@postRegistration');

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

	Route::get('medication', 'MedController@getIndex');
	Route::post('medication/entries', 'MedController@postMedEntries');
	Route::post('medication/edit', 'MedController@postMedEdit');
	Route::put('medication', 'MedController@putMedEdit');
	Route::post('medication/delete/{id}', array(
		'as' => 'medication.delete',
		'uses' => 'MedController@postDelete'
		));

	Route::get('breathing', 'BreathingController@getIndex');
	Route::get('treatmentplan', 'TreatmentPlanController@getIndex');
	Route::get('diet', 'DietController@getIndex');
	Route::get('settings', 'SettingsController@getIndex');
	Route::get('profile', 'ProfileController@getIndex');
	Route::get('goals', 'GoalsController@getIndex');

	Route::get('journal', 'JournalController@getIndex');
	Route::post('journal', 'JournalController@postJournalEntry');
	Route::get('entries', 'JournalController@getEntries');

	Route::get('relationships','RelationshipsController@getIndex');
	Route::post('relationships', 'RelationshipsController@postRelationshipsEntries');

	Route::get('dashboard', 'DashboardController@getIndex');
	Route::post('dashboard', 'DashboardController@postDateRange');


});

// Event::listen('illuminate.query', function() {
//     print_r(func_get_args());
// });


//Route::resource('login', 'HomeController');

