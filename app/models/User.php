<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
 	
	/**
	* Get the user's daily mood entries
	*
	* @return array
	*/
	public function moods()
	{
		return $this->hasMany('Mood')->where('created_at', '>=', new DateTime('today'));
	}

		/**
	 * Return last night's sleep entries
	 *
	 * @return array
	 */
	public function sleepEntries()
	{
		return $this->hasMany('Sleep')->where('created_at', '>=', new DateTime('yesterday'));

	}
	/**
	 * Return journal entries
	 *
	 * @return array
	 */
	public function journalEntries()
	{
		return $this->hasMany('JournalEntry');

	}

}