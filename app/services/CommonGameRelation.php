<?php
use Carbon\Carbon;
class CommonGameRelation
{
	public static function CommonGameRelation($input)
	{		
		$id = GameRelation::create($input)->id;
		return $id;
	}
}

