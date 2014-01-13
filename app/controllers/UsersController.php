<?php

class UsersController extends BaseController {

	protected $restful = true;

	// protected $layout = 'base';

	// public function __construct()
	// {
	// 	$this->beforeFilter('csrf',array('on'=>'post'));
	// }

	public function getIndex()
	{
		echo 'fk';
	}

	public function getTest()
	{
		echo 'hi';
	}


}