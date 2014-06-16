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

		if(MedEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get())
		{
			return MedEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get();
		}
		else
		{
			return;
		}


		
		//v v v Null filter if you need it
		// $test = Medications::whereValidUntil(null)->get();
		// $entries_array = array();
		// foreach($test as $value){
		// 	echo MedEntries::where('med_id', $value->id)->whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get();
		// 	//whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get(array('id','med_id', 'am_times_taken', 'pm_times_taken'))
		// }
		// var_dump($entries_array[0]);
	}

	public static function totalMeds($from, $to, $id = null)
	{
		if($id == null)
		{
			$id = User::find(Auth::user()->id)->id;
		}

		//join meds and medentries, find percentage of meds taken for last week by the day
		return DB::table('med_entries')
					->join('meds', 'med_entries.med_id', '=', 'meds.id' )
					->select(DB::raw('med_entries.created_at as entries_created_at, Date(med_entries.created_at) as date, SUM(med_entries.am_times_taken + med_entries.pm_times_taken) / SUM(meds.am_regimen + meds.pm_regimen) as percentage'))
					->whereBetween('med_entries.created_at', array($from, $to))
					->where('user_id', $id)
					->groupBy(DB::raw('date'))
					->get();


	}



	

}