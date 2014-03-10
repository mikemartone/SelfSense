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

			//retrieve results depending on day offset (0 = today, 1 = yesterday, 2 = day before yesterday)
			if($day === 0)
			{
				$am = Input::get('am');
				$pm = Input::get('pm');
			}
			elseif($day === 1)
			{
				$am = Input::get('yam');
				$pm = Input::get('ypm');
			}
			else
			{
				$am = Input::get('dbyam');
				$pm = Input::get('dbypm');
			}

			//if no entries have been made today...
			if(count(MedEntries::getEntry($day)) === 0)
			{

				//Count number of times a medication was checked
				//If medication not checked, give it a value of zero, else give it the user-provided value
				foreach($regimen as $value)
				{	
					//if some am values exist- count instances of med id to determine times taken, if not set, set to 0
					if(isset($am))
					{
						if(!isset(array_count_values($am)[$value['id']]))
						{
							$am_times_taken = 0;
						}
						else
						{
							$am_times_taken = array_count_values($am)[$value['id']];
						}
					}

					//if no am values exist, set am times taken to 0
					else
					{
						$am_times_taken = 0;
					}
					
					//if some pm values exist- count instances of med id to determine times taken, if not set, set to 0
					if(isset($pm))
					{
						if(!isset(array_count_values($pm)[$value['id']]))
						{
							$pm_times_taken = 0;
						}
						else
						{
							$pm_times_taken = array_count_values($pm)[$value['id']];
						}
					}

					//if no pm values exist, set pm times taken to 0
					else
					{
						$pm_times_taken = 0;
					}
					
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
	
					//if some am values exist- count instances of med id to determine times taken, if not set, set to 0
					if(isset($am))
					{
						if(!isset(array_count_values($am)[$value['id']]))
						{
							$am_times_taken = 0;
						}
						else
						{
							$am_times_taken = array_count_values($am)[$value['id']];
						}
					}

					//if no am values exist, set am times taken to 0
					else
					{
						$am_times_taken = 0;
					}
					
					//if some pm values exist- count instances of med id to determine times taken, if not set, set to 0
					if(isset($pm))
					{
						if(!isset(array_count_values($pm)[$value['id']]))
						{
							$pm_times_taken = 0;
						}
						else
						{
							$pm_times_taken = array_count_values($pm)[$value['id']];
						}
					}

					//if no pm values exist, set pm times taken to 0
					else
					{
						$pm_times_taken = 0;
					}
					

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