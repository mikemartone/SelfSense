<?php

class SleepController extends BaseController {

	public function getIndex()
	{
		$user_id = User::find(Auth::user()->id);	
		//$entries = Sleep::where('user_id', $user_id->id)->where('created_at', '>=', date('Y-m-d'))->get(array('start', 'interruption0', 'interruption1', 'interruption2', 'note0', 'note1', 'note2', 'stop'));
		$data = array(
						'entries' => $user_id->sleepEntries, 
						'pageTitle' => 'sleep'
					 );
		return View::make('sleep', $data);

	}

	public function postSleepEntries()
	{
		$user_id = User::find(Auth::user()->id);		
		$entry_check = Sleep::where('user_id', $user_id->id)->where('created_at', '>=', date('Y-m-d'))->first();
		if($entry_check)
		{
			$entry = Sleep::find($entry_check->id);
			$entry->start = Input::get('start') != 0 ? Input::get('start') : null;
			$entry->interruption0 = Input::get('interruption0') != 0 ? Input::get('interruption0') : null;
			$entry->interruption1 = Input::get('interruption1') != 0 ? Input::get('interruption1') : null;
			$entry->interruption2 = Input::get('interruption2') != 0 ? Input::get('interruption2') : null;
			$entry->note0 = Input::get('note0') != 0 ? Input::get('note0') : null;
			$entry->note1 = Input::get('note1') != 0 ? Input::get('note1') : null;
			$entry->note2 = Input::get('note2') != 0 ? Input::get('note2') : null;
			$entry->stop =  Input::get('stop') != 0 ? Input::get('stop') : null;
			$entry->created_at = new DateTime;
			$entry->updated_at = new DateTime;
			$entry->user_id = Auth::user()->id;
			$entry->save();

		}
		else
		{
			$sleep = new Sleep;
			$sleep->start = Input::get('start') != 0 ? Input::get('start') : null;
			$sleep->interruption0 = Input::get('interruption0') != 0 ? Input::get('interruption0') : null;
			$sleep->interruption1 = Input::get('interruption1') != 0 ? Input::get('interruption1') : null;
			$sleep->interruption2 = Input::get('interruption2') != 0 ? Input::get('interruption2') : null;
			$sleep->note0 = Input::get('note0') != 0 ? Input::get('note0') : null;
			$sleep->note1 = Input::get('note1') != 0 ? Input::get('note1') : null;
			$sleep->note2 = Input::get('note2') != 0 ? Input::get('note2') : null;
			$sleep->stop =  Input::get('stop') != 0 ? Input::get('stop') : null;
			$sleep->created_at = new DateTime;
			$sleep->updated_at = new DateTime;
			$sleep->user_id = Auth::user()->id;
			$sleep->save();

		}

		return Redirect::to('sleep');


			// //determine x position for icon placement
			// $dict = array('am' => array('6:00' => 31, '6:30' => 56, '7:00' => 81, '7:30' => 105, '8:00' => 130, '8:30' => 155, '9:00' => 179,
			// 				'9:30' => 204, '10:00' => 229, '10:30' => 253, '11:00' => 278, '11:30' => 303, '12:00' => 920), 
							
			//   'pm' => array('12:00' => 328, '12:30' => 352, '1:00' => 377, '1:30' => 402, '2:00' => 426, '2:30' => 451, '3:00' => 476,
			// 				'3:30' => 500, '4:00' => 525, '4:30' => 550, '5:00' => 575, '5:30' => 599, '6:00' => 624, '6:30' => 648,
			// 				'7:00' => 673, '7:30' => 697, '8:00' => 722, '8:30' => 747, '9:00' => 772, '9:30' => 796, '10:00' => 821,
			// 				'10:30' => 846, '11:00' => 871, '11:30' => 895)		
			// 				);
			// $x_position = $dict[Input::get('dn')][Input::get('time')];

			// $mood = new Mood;
			// $mood->mood_type = Input::get('mood');
			// $mood->x_position = $x_position;
			// $mood->date = new DateTime;
			// $mood->updated_at = new DateTime;
   //     		$mood->created_at = new DateTime;
   //     		$mood->user_id = Auth::user()->id;
   //     		$mood->save();

			// return Redirect::to('mood');


	}

 
}