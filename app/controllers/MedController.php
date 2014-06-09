<?php

class MedController extends BaseController {

	public function getIndex()
	{
		$regimen = Medications::getRegimen();
		$dbyentries = MedEntries::getEntry(2);
		$yentries = MedEntries::getEntry(1);
		$entries = MedEntries::getEntry(0);
		
		$data = array(
						'entries' => $entries,
						'yentries' => $yentries,
						'dbyentries' => $dbyentries,
						'regimen' => $regimen, 
						'pageTitle' => 'medication'
					 );
		return View::make('meds', $data);

	}

	public function postMedEntries()
	{
		function daily_count($day)
		{
			$date = date("Y-m-d", strtotime( '-'. $day . 'days' ) );
			$user_id = User::find(Auth::user()->id);	
			$regimen = Medications::getRegimen();
			$entry_check = MedEntries::getEntry($day);

			$day_array = array(
							array('am','pm'),
							array('yam', 'ypm'),
							array('dbyam', 'dbypm')
							);

			//retrieve results depending on day offset

			$am = Input::get($day_array[$day][0]);
			$pm = Input::get($day_array[$day][1]);


			//if no entries have been made today...
			if(!count(MedEntries::getEntry($day)))
			{

				//Count number of times a medication was checked
				//If medication not checked, give it a value of zero, else give it the user-provided value
				foreach($regimen as $value)
				{	
					$am_times_taken = Helpers::determineTimesTaken($am, $value);
					
					$pm_times_taken = Helpers::determineTimesTaken($pm, $value);
					
					$entry = new MedEntries;
					$entry->med_id = $value['id'];
					$entry->am_times_taken = $am_times_taken;
					$entry->pm_times_taken = $pm_times_taken;
					$entry->created_at = $date;
					$entry->updated_at = new DateTime;
					$entry->save();

				}


			}
			else
			{
				foreach($regimen as $key => $value)
				{	
	
					$am_times_taken = Helpers::determineTimesTaken($am, $value);
					
					$pm_times_taken = Helpers::determineTimesTaken($pm, $value);
					

					//If new entry was added after medications have been updated for the day, make new entry for the new med, otherwise update by id
					if(isset($entry_check[$key]))
					{
						$entry = MedEntries::find($entry_check[$key]['id']);
						$entry->med_id = $value['id'];
						$entry->am_times_taken = $am_times_taken;
						$entry->pm_times_taken = $pm_times_taken;
						$entry->updated_at = new DateTime;
						$entry->save();
					}
					else
					{
						$entry = new MedEntries;
						$entry->med_id = $value['id'];
						$entry->am_times_taken = $am_times_taken;
						$entry->pm_times_taken = $pm_times_taken;
						$entry->created_at = $date;
						$entry->updated_at = new DateTime;
						$entry->save();
					}
				}
			}
		}

		//run function for today, yesterday, and day  before yesterday
		daily_count(0);
		daily_count(1);
		daily_count(2);

		return Redirect::to('medication');


	}




	public function putMedEdit()
	{
		$user_id = User::find(Auth::user()->id);
		$medication = Medications::find(Input::get('edit_id'));
		$medication->valid_until = new DateTime;
		$medication->save();

		$edited_medication = new Medications;
		$edited_medication->user_id = $user_id->id;
		$edited_medication->medication = Input::get('edit_medication');
		$edited_medication->dosage = Input::get('edit_dosage');
		$edited_medication->prescribedby = Input::get('edit_prescribedby');
		$edited_medication->am_regimen = Input::get('edit_am_regimen');
		$edited_medication->pm_regimen = Input::get('edit_pm_regimen');
		$edited_medication->updated_at = new DateTime;
		$edited_medication->created_at = new DateTime;
		$edited_medication->save();
		return Redirect::to('medication');

	}

	public function postMedEdit()
	{

		$user_id = User::find(Auth::user()->id);

		$new_medication = new Medications;
		$new_medication->user_id = $user_id->id;
		$new_medication->medication = Input::get('new_medication');
		$new_medication->dosage = Input::get('new_dosage');
		$new_medication->prescribedby = Input::get('new_prescribedby');
		$new_medication->am_regimen = Input::get('new_am_regimen');
		$new_medication->pm_regimen = Input::get('new_pm_regimen');
		$new_medication->updated_at = new DateTime;
		$new_medication->created_at = new DateTime;
		$new_medication->save();
		return Redirect::to('medication');
	}

	public function postDelete($id)
	{
		$med_entry = Medications::find($id);
		$med_entry->delete();
		return Redirect::to('medication');
	}

 
}