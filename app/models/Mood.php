<?php


class Mood extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'moods';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');


	/**
	 * Return todays entries
	 *
	 * @return array
	 */
	public function scopeToday($query)
	{
		return $query->where('created_at', '>=', new DateTime('today'));

	}

	public function user()
	{
		return $this->belongsTo('User');
	}




	

}