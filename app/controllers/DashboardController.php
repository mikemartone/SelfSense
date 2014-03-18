<?php

class DashboardController extends BaseController {


	public function getIndex()
	{
		$meddata = MedEntries::calculateMeds();
		$data = array('pageTitle' => 'dashboard', 'meddata' => $meddata);
		return View::make('dashboard', $data);
	}



}