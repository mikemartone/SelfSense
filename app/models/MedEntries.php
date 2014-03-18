<?php


class MedEntries extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'med_entries';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('med_id', 'am_times_taken', 'pm_times_taken');



	public function entry()
	{
		return $this->belongsTo('Med');
	}

	public static function getEntry($date)
	{
		$user_id = User::find(Auth::user()->id);	
		$med_id = Medications::where('user_id', $user_id->id)->first()->id;
		
		//v v v Null filter if you need it
		// $test = Medications::whereValidUntil(null)->get();
		// $entries_array = array();
		// foreach($test as $value){
		// 	echo MedEntries::where('med_id', $value->id)->whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get();
		// 	//whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get(array('id','med_id', 'am_times_taken', 'pm_times_taken'))
		// }
		// var_dump($entries_array[0]);

		return MedEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get();
	}

	public static function calculateMeds($from = null, $to = null)
	{

		//Set default to past week
		if(is_null($from))
		{
			$from = date('Y-m-d 00:00:00', strtotime('-'. 7 .' days'));
		}

		if(is_null($to))
		{
			$to = date('Y-m-d 23:59:59', strtotime('-'. 0 .' days'));
		}



		return MedEntries::entry();


	}



	

}