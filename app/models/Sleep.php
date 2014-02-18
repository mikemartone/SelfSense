<?php


class Sleep extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'sleep_entries';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('user_id', 'start', 'interruption0', 'interruption1', 'interruption2', 'note0', 'note1', 'note2', 'stop');



	public function user()
	{
		return $this->belongsTo('User');
	}




	

}