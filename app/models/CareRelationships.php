<?php


class CareRelationships extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'care_relationships';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('caretaker_id', 'user_id', 'relationship');


	public function user()
	{
		return $this->belongsTo('User');
	}


	

}