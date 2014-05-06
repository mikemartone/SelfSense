<?php


class JournalEntry extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'journal_entries';

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

	public static function totalMoods($mood, $from, $to)
	{
		$user_id = User::find(Auth::user()->id);

		//Set default to past week
		

		return DB::table('moods')
					->whereBetween('created_at', array($from, $to))
					->where('user_id', $user_id->id)
					->where('mood_type', $mood)
					->select(DB::raw('Date(created_at) as created_date, COUNT(*) as count, mood_type'))
					->groupBy('mood_type','created_date')
					->get();
	}




	

}