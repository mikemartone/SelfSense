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



	public function user()
	{
		return $this->belongsTo('Med');
	}

	public static function getEntry($date)
	{
		$user_id = User::find(Auth::user()->id);	
		$med_id = Medications::where('user_id', $user_id->id)->first()->id;
		return MedEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. $date .' days')), date('Y-m-d 23:59:59', strtotime('-'. $date .' days')) ))->get(array('id','med_id', 'am_times_taken', 'pm_times_taken'));
	}



	

}