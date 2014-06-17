<?php

class RelationshipsController extends BaseController {


	public function getIndex()
	{
		$user_id = User::find(Auth::user()->id);
		$RelationshipsEntries = $user_id->relationshipsEntries;
		foreach($RelationshipsEntries as $key => $item)
		{
			$RelationshipsEntries[$key]->rel_id = Relationships::find($item->rel_id)->name;
		}
		
		$entries = $RelationshipsEntries;


		$data = array('pageTitle' => 'relationships',
					  'entries' => $entries
						);
		return View::make('relationships', $data);
	}

	public function postRelationshipsEntries()
	{

		$user_id = User::find(Auth::user()->id);

		

		if(count($user_id->RelationshipsEntries) != 0 ) 
		{


			//get existing entries by id and update them
			foreach($user_id->RelationshipsEntries as $rel_entry)
			{
				
				$name = Relationships::find($rel_entry->rel_id)->name;
				
				$entry = RelationshipsEntries::find($rel_entry->id);
				$entry->closeness = Input::get($name) != 0 ? Input::get($name) : null;
				$entry->frequency = Input::get($name) != 0 ? Input::get($name . 'y') : null;
				$entry->updated_at = new DateTime;
				$entry->save();
			}
		}

		else
		{	

			//make new entries, using the relationships table
			foreach(Relationships::get() as $relationship)
			{
				echo 
				$name = $relationship->name;

				$entry = new RelationshipsEntries;
				$entry->user_id = User::find(Auth::user()->id)->id;
				$entry->rel_id = $relationship->id;
				$entry->closeness = Input::get($name) != 0 ? Input::get($name) : null;
				$entry->frequency = Input::get($name) != 0 ? Input::get($name . 'y') : null;
				$entry->created_at = new DateTime;
				$entry->updated_at = new DateTime;

				$entry->save();
			}
		}

		return Redirect::to('relationships');
	}



}