<?php


class Relationships extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'relationships';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('user_id', 'name', 'valid_until');


	public function relationshipsEntries()
	{
		return $this->hasMany('RelationshipsEntries', 'rel_id');
	}

	public static function getRelationships()
	{
		$user_id = User::find(Auth::user()->id);	
		$rel_id = Relationships::where('user_id', $user_id->id)->first()->id;
		//return Relationships::where('user_id', $user_id->id)->whereValidUntil(null)->get();
		return Relationships::with('RelationshipsEntries')->get();
	}



	

}