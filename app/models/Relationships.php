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

	public static function getRelationships($id = null)
	{

		if($id == null)
		{
			$id = User::find(Auth::user()->id)->id;
		}

		if(isset(Relationships::where('user_id', $id)->first()->id))
		{
			$rel_id = Relationships::where('user_id', $id)->first()->id;
			return Relationships::with('RelationshipsEntries')->get();
		}

		return false;
		//return Relationships::where('user_id', $user_id->id)->whereValidUntil(null)->get();
		
	}



	

}