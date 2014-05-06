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
		return DB::table('relationships')
					->join('relationships_entries', 'relationships.id', '=', 'relationships_entries.rel_id' )
					->where('user_id', $user_id->id)
					->whereBetween('relationships_entries.created_at', array(date('Y-m-d 00:00:00', strtotime('-'. 7 .' days')), date('Y-m-d 23:59:59', strtotime('-'. 0 .' days')) ))
					->get();
							
	}

	public static function entriesExist()
	{
		$user_id = User::find(Auth::user()->id);
		return RelationshipsEntries::whereBetween('created_at', array(date('Y-m-d 00:00:00', strtotime('-'. 7 .' days')), 
												   date('Y-m-d 23:59:59', strtotime('-'. 0 .' days')) ))->get();
		
	}

	public static function totalRelationships($from = null, $to = null)
	{
		$user_id = User::find(Auth::user()->id);

		//Set default to past week
		if(is_null($from))
		{
			$from = date('Y-m-d 00:00:00', strtotime('-'. 7 .' days'));
		}

		if(is_null($to))
		{
			$to = date('Y-m-d 23:59:59', strtotime('-'. 0 .' days'));
		}

		//join meds and medentries, find percentage of meds taken for last week by the day
		return DB::table('relationships_entries')
					->join('relationships', 'relationships_entries.rel_id', '=', 'relationships.id' )
					->select(DB::raw('rel_id, relationships_entries.created_at as entries_created_at, Date(relationships_entries.created_at) as date, AVG(relationships_entries.frequency) as frequency, AVG(relationships_entries.closeness) as closeness'))
					->whereBetween('relationships_entries.created_at', array($from, $to))
					->where('user_id', $user_id->id)
					->groupBy('rel_id')
					->get();


	}


	

}