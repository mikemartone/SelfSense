<?php

class JournalController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'journal');
		return View::make('journal', $data);
	}



}