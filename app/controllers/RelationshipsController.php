<?php

class RelationshipsController extends BaseController {


	public function getIndex()
	{
		$relationships = Relationships::getRelationships();
		$entries = RelationshipsEntries::getEntry();


		$data = array('pageTitle' => 'relationships',
					  'relationships' => $relationships,
					  'entries' => $entries
						);
		return View::make('relationships', $data);
	}

	public function postRelationshipsEntries()
	{

		$user_id = User::find(Auth::user()->id);
		if(count(RelationshipsEntries::getEntry()) != 0 ) 
		{
			//get existing entries by id and update them
			foreach(RelationshipsEntries::getEntry() as $rel_entry)
			{
				$entry = RelationshipsEntries::find($rel_entry->id);
				$entry->closeness = Input::get($rel_entry->name) != 0 ? Input::get($rel_entry->name) : null;
				$entry->frequency = Input::get($rel_entry->name) != 0 ? Input::get($rel_entry->name . 'y') : null;
				$entry->updated_at = new DateTime;
				$entry->save();
			}
		}

		else
		{	


			//make new entries, using the relationships table
			foreach(Relationships::getRelationships() as $rel_entry)
			{
				$entry = new RelationshipsEntries;
				$entry->rel_id = $rel_entry->id;
				$entry->closeness = Input::get($rel_entry->name) != 0 ? Input::get($rel_entry->name) : null;
				$entry->frequency = Input::get($rel_entry->name) != 0 ? Input::get($rel_entry->name . 'y') : null;
				$entry->created_at = new DateTime;
				$entry->updated_at = new DateTime;

				$entry->save();
			}
		}

		return Redirect::to('relationships');
	}



}