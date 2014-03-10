<?php

class ProfileController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'my profile');
		return View::make('profile', $data);
	}



}