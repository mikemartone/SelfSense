<?php


class Mood extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'moods';

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

	public static function totalMoods($mood, $from, $to, $id = null)
	{

		if($id == null)
		{
			$id = User::find(Auth::user()->id)->id;
		}
		

		//Set default to past week

		return DB::table('moods')
					->whereBetween('created_at', array($from, $to))
					->where('user_id', $id)
					->where('mood_type', $mood)
					->select(DB::raw('Date(created_at) as created_date, COUNT(*) as count, mood_type'))
					->groupBy('mood_type','created_date')
					->get();
	}




	

}