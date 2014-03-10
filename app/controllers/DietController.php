<?php

class DietController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'diet');
		return View::make('diet', $data);
	}



}