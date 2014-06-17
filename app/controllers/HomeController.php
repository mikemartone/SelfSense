<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('landing');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('login' => 'required', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{
			return Redirect::to('/')->withErrors($v);
		}

		else
		{
			$credentials = array('username' => $input['login'], 'password' => $input['password']);

			if(Auth::attempt($credentials))
			{
				return Redirect::to('login');
			}

			else
			{

				return Redirect::to('/')->withErrors($v);


			}
		}
	}

	public function getLogin()
	{
		if(Auth::user()->access_level == '0')
		{
			return View::make('user_home', array('pageTitle' => 'home'));
		}
		elseif(Auth::user()->access_level == '1')
		{
			return Redirect::to('caretakerlogin');
		}
		else
		{
			return Redirect::to('/');
		}
		
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

}