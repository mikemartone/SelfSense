<?php

class RegistrationController extends BaseController {

	public function getIndex()
	{

		$data = array(
						'pageTitle' => 'Registration'
					 );
		return View::make('registration', $data);
	}

	public function postRegistration()
	{
		$input = Input::all();

		$rules = array(
			'username' => 'required|alpha_num|min:2|unique:users',
			'email' => 'required|email|unique:users',
			'password' => 'required|confirmed',
			'password_confirmation' =>'required'
			);

		$v = Validator::make($input,$rules);

		if($v->fails())
		{
			return Redirect::to('registration')->withErrors($v);
		}

		else
		{
			$user = new User;
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = Hash::make($input['password']);
			$user->updated_at = new DateTime;
       		$user->created_at = new DateTime;
       		$user->access_level = 0;
       		$user->save();

			return Redirect::to('/')->with('message', 'Thanks for registering!');
		}
	}


}
