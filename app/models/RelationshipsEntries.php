<?php


class RelationshipsEntries extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'relationships_entries';

	/**
	* The fillable attributes
	*
	* @var array
	*/
	protected $fillable = array('rel_id', 'frequency', 'closeness');



	public function relationships()
	{
		return $this->belongsTo('Relationships');
	}

	public static function getEntry()
	{
		$user_id = User::find(Auth::user()->id);	
		$rel_ids = Relationships::where('user_id', $user_id->id)->get();

			
		//Show entries made in last week
		return Relationships::with('RelationshipsEntries')->whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. 7 .' days')), 
												   date('Y-m-d 23:59:59', strtotime('-'. 0 .' days')) ))
												    ->where('user_id', $user_id)->get();
	}

	public static function entriesExist()
	{
		$user_id = User::find(Auth::user()->id);
		return RelationshipsEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. 7 .' days')), 
												   date('Y-m-d 23:59:59', strtotime('-'. 0 .' days')) ))->get();
		
	}



	

}