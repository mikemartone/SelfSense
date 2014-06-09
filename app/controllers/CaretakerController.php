<?php

class CaretakerController extends BaseController {


	public function getIndex()
	{
		$user_id = User::find(Auth::user()->id);
		
		$caseload = $user_id->CareRelationships;
		
		// foreach($caseload as $case)
		// {
		// 	$user = User::find($case->user_id);
		// 	echo $user->username;
		// 	echo $user->id;
		// }

		$data = array('pageTitle' => 'Home', 'caseload' => $caseload);
		return View::make('caretaker', $data);
	}



}