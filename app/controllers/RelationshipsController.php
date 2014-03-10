<?php

class RelationshipsController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'relationships');
		return View::make('relationships', $data);
	}



}