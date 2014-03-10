<?php

class SettingsController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'settings');
		return View::make('settings', $data);
	}



}