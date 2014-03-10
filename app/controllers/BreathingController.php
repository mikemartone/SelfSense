<?php

class BreathingController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'breathing exercise');
		return View::make('breathing', $data);
	}



}