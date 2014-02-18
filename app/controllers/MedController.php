<?php

class MedController extends BaseController {

	public function getIndex()
	{
		//$json = $user_id->sleepEntries->toJson();
		//echo $user_id->sleepEntries->stop;
		$regimen = Medications::getRegimen();
		$dbyentries = MedEntries::getEntry(2);
		$yentries = MedEntries::getEntry(1);
		$entries = MedEntries::getEntry(0);
		// //$entries = Response::json($query);
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
		$dby_regimen_count = count(Medications::getRegimen(0));

		

		function daily_count($day)
		{
			$user_id = User::find(Auth::user()->id);	
			$regimen = Medications::getRegimen();
			$entry_check = MedEntries::getEntry($day);

			//retrieve results depending on day offset
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



			if(count(MedEntries::getEntry($day)) === 0)
			{
				
				
				//Count number of times a medication was checked
				//If medication not checked, give it a value of zero, else give it the user-provided value
				foreach($regimen as &$value)
				{	
					//if some am values exist- check by each am medication to see if it has been taken, if not set, set to 0
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
					
					//if some pm values exist- check by each pm medication to see if it has been taken, if not set, set to 0
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
					
					$date = date("Y-m-d", strtotime( '-'. $day . 'days' ) );

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
				foreach($regimen as $key=>&$value)
				{	
					//if some am values exist- check by each am medication to see if it has been taken, if not set, set to 0
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
					
					//if some pm values exist- check by each pm medication to see if it has been taken, if not set, set to 0
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
					
					$date = date("Y-m-d", strtotime( '-'. $day . 'days' ) );
					$entry = MedEntries::find($entry_check[$key]['id']);
					$entry->med_id = $value['id'];
					$entry->am_times_taken = $am_times_taken;
					$entry->pm_times_taken = $pm_times_taken;
					$entry->updated_at = new DateTime;
					$entry->save();


				}




				// foreach ($regimen as &$value) {
				// for($i = 0; $i < count($regimen); $i++)
				// {
				//*********************LOOK FOR EMPTY ROW, THEN INSERT EMPTY
				//var_dump($am);
				// $entry = MedEntries::find($entry_check[$i]['id']);
				// $entry->am_times_taken = $entry_check[$i]['am_times_taken'];
				// $entry->pm_times_taken = $entry_check[$i]['pm_times_taken'];
				// $entry->updated_at = new DateTime;
				// $entry->save();
 
				 // }
				

				// $am_times_taken = $entry_check[0]->id;
				// $pm_times_taken = $entry_check[1]->id;

			}

		}

		daily_count(0);
		daily_count(1);
		daily_count(2);

		return Redirect::to('medication');
		// $entry = new entry;
		// $mood->mood_type = Input::get('mood');
		// $mood->x_position = $x_position;
		// $mood->date = new DateTime;
		// $mood->updated_at = new DateTime;
  //  		$mood->created_at = new DateTime;
  //  		$mood->user_id = Auth::user()->id;
  //  		$mood->save();

		// return Redirect::to('meds');

	}

 
}