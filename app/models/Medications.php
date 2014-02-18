<?php


class Medications extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'meds';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('user_id', 'medication', 'dosage', 'prescribedby','am_regimen','pm_regimen');


	public function user()
	{
		return $this->hasMany('MedEntries');
	}

	public static function getRegimen()
	{
		$user_id = User::find(Auth::user()->id);	
		$med_id = Medications::where('user_id', $user_id->id)->first()->id;
		return Medications::where('user_id', $user_id->id)->get(array('id','am_regimen', 'pm_regimen'));
	}



	

}