<?php

class MoodController extends BaseController {

	public function getIndex()
	{
	
		//round minute to nearest half hour, if rounding up to next hour, an hour is added to $hour
		$minute = (date('i') >= 30 ? '30':'00');
		
		$hour = date('g');

		$roundedNow = $hour. ':' .$minute;

		$user_id = User::find(Auth::user()->id);
		// print_r($user_id->moods);

		$data = array(
						'entries' => $user_id->moods,
						'roundedNow' => $roundedNow,
						'pageTitle' => 'mood tracker'
					 );
		$queries = DB::getQueryLog();
		$last_query = end($queries);

		return View::make('mood', $data);

	}

	public function postMoodEntries()
	{
		$input = Input::all();

		$rules = array('mood' => 'required', 'time' => 'required', 'dn' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{
			return Redirect::to('mood')->withErrors($v);
		}
		else
		{

			//determine x position for icon placement
			$dict = array('am' => array('6:00' => 31, '6:30' => 56, '7:00' => 81, '7:30' => 105, '8:00' => 130, '8:30' => 155, '9:00' => 179,
							'9:30' => 204, '10:00' => 229, '10:30' => 253, '11:00' => 278, '11:30' => 303, '12:00' => 920), 
							
			  'pm' => array('12:00' => 328, '12:30' => 352, '1:00' => 377, '1:30' => 402, '2:00' => 426, '2:30' => 451, '3:00' => 476,
							'3:30' => 500, '4:00' => 525, '4:30' => 550, '5:00' => 575, '5:30' => 599, '6:00' => 624, '6:30' => 648,
							'7:00' => 673, '7:30' => 697, '8:00' => 722, '8:30' => 747, '9:00' => 772, '9:30' => 796, '10:00' => 821,
							'10:30' => 846, '11:00' => 871, '11:30' => 895)		
							);
			$x_position = $dict[Input::get('dn')][Input::get('time')];

			$mood = new Mood;
			$mood->mood_type = Input::get('mood');
			$mood->x_position = $x_position;
			$mood->date = new DateTime;
			$mood->updated_at = new DateTime;
       		$mood->created_at = new DateTime;
       		$mood->user_id = Auth::user()->id;
       		$mood->save();

			return Redirect::to('mood');

		}

	}

	public function postDelete($id)
		{
			$entry = Mood::find($id);
			$entry->delete();
			return Redirect::to('mood');
		}	


}