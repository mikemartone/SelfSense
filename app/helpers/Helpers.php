<?php

class Helpers {

	public static function determineTimesTaken($timeOfDay, $value)
	{
		//if some values exist- count instances of med id to determine times taken, if not set, set to 0
		if(isset($timeOfDay))
					{
						if(!isset(array_count_values($timeOfDay)[$value['id']]))
						{
							$times_taken = 0;
							return $times_taken;
						}
						else
						{
							$times_taken = array_count_values($timeOfDay)[$value['id']];
							return $times_taken;
						}
					}

					//if no values exist, set times taken to 0
					else
					{
						$times_taken = 0;
						return $times_taken;
					}
		return false;
	}

}

	

