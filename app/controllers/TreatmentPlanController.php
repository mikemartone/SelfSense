<?php

class TreatmentPlanController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'treatment plan');
		return View::make('treatmentplan', $data);
	}



}