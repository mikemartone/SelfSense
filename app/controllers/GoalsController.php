<?php

class GoalsController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'goals');
		return View::make('goals', $data);
	}



}