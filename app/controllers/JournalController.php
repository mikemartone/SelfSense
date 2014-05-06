<?php

class JournalController extends BaseController {


	public function getIndex()
	{
		$data = array('pageTitle' => 'journal');
		return View::make('journal', $data);
	}

	public function postJournalEntry()
	{

		$input = Input::all();

		$rules = array('subject' => 'required', 'body' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{
			return Redirect::to('journal')->withErrors($v);
		}
		else
		{
			$entry = new JournalEntry;
			$entry->subject = Crypt::encrypt(Input::get('subject'));
			$entry->body = Crypt::encrypt(Input::get('body'));
			$entry->updated_at = new DateTime;
       		$entry->created_at = new DateTime;
       		$entry->user_id = Auth::user()->id;
       		$entry->save();

			return Redirect::to('entries');
		}

	}

	public function getEntries()
	{
		$user_id = User::find(Auth::user()->id);
		$entries = $user_id->journalEntries;
		$total_pages = ceil(count($entries)/5); 
		$data = array('pageTitle' => 'journal entries', 'entries' => $entries, 'total_pages' => $total_pages);
		return View::make('journal_entries', $data);
	}


}