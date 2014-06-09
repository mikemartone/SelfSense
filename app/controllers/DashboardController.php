<?php

class DashboardController extends BaseController {


	public function getIndex($id = null)
	{

		$from = Session::get('from');
		$to = Session::get('to');

		//Default dashboard shows last 7 days
		if(!isset($from))
		{
			$from = date('Y-m-d', strtotime('-'. 7 .' days'));
		}

		if(!isset($to))
		{
			$to = date('Y-m-d 23:59:59', strtotime('+'. 0 .' days'));
		}


		$med_array = array();

		$meddata = MedEntries::totalMeds($from, $to, $id);

		foreach($meddata as $row)
		{
			//echo strtotime($row->entries_created_at)*1000;
			//echo gettype($row->percentage);
			$med_array[] = [strtotime($row->entries_created_at)*1000, 100*$row->percentage];
			//array_push($med_array, array('Date.UTC(' . $row->date . ')', $row->percentage));
		}

		$sleep_array = array();
		$sleepdata = Sleep::totalSleep($from, $to, $id);
		foreach($sleepdata as $row)
		{
			//this translates the pixel offset value into a time of day, using an arbitrary start date (1395338400000) and turning pixel values into datetime values
			$sleep_array[] = [strtotime($row->created_at)*1000, 1395338400000 + ($row->stop-110) * 82025, 1395338400000 + ($row->start-110) * 82025 ];
		}

		$relationships_frequency_array = array();
		$relationships_closeness_array = array();
		$relationshipsdata = RelationshipsEntries::totalRelationships($from, $to, $id);

		
		foreach($relationshipsdata as $row)
		{
			$relationships_frequency_array[] = (1 + $row->frequency) / 2.1;  // Convert pixel value to percentage number, for graphing purposes (1 added to avoid zero)
			$relationships_closeness_array[] = 100 - (($row->closeness - 219) / 7.55);  // Convert pixel value to percentage number. (subtract from 100 to invert.  Subtract 219 to create 1 - 755 range)
		}

		$moods = array('happy', 'sad', 'angry', 'disappointed', 'frustrated', 'pride', 'excited', 'scared', 'surprised', 'nervous');
		$mood_series = array();
		foreach($moods as $row)
		{
			$total_entries = Mood::totalMoods($row, $from, $to, $id);
			if(count(Mood::totalMoods($row, $from, $to, $id)) > 0)

			{
				$mood_series[$row] = array();
				foreach($total_entries as $row)
				{
					$mood_series[$row->mood_type][] = array((strtotime($row->created_date) * 1000), $row->count);

				}
			}
		}

		$med_array = json_encode($med_array);
		$sleep_array = json_encode($sleep_array);
		$relationships_frequency_array = json_encode($relationships_frequency_array);
		$relationships_closeness_array = json_encode($relationships_closeness_array);
		$mood_array = json_encode($mood_series);


		$data = array('pageTitle' => 'dashboard', 'id' => $id, 'med_array' => $med_array, 'sleep_array' => $sleep_array, 
					  'relationships_frequency_array' => $relationships_frequency_array, 'relationships_closeness_array' => $relationships_closeness_array,
					   'mood_array' => $mood_array, 'from' => $from, 'to' => $to);


		return View::make('dashboard', $data);
	}

	public function postDateRange($id = null)
	{
		if($id == null)
		{
			$id = User::find(Auth::user()->id);
		}

		$from = Input::get('from');

		//set $to to span entire selected day
		$to = date('Y-m-d 23:59:59', strtotime(Input::get('to')));

		return Redirect::to('dashboard/' . $id )->with('from', $from)->with('to', $to);
	}



}