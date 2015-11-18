<?php
use Carbon\Carbon;
class CommonNormal
{
	public static function delete($id)
	{
		$name = self::commonName();
		$name::find($id)->delete();
	}

	public static function update($id, $input)
	{
		$name = self::commonName();
		$name::find($id)->update($input);
	}

	public static function create($input, $name = NULL)
	{
		$name = self::commonName($name);
		// dd($input);
		$id = $name::create($input)->id;
		return $id;
	}

	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == '') {
			return 'CategoryParent';
		}
		if($name =='category_parent'){
			return 'CategoryParent';
		}
		if($name =='category'){
			return 'Game';
		}
		if ($name == 'manager') {
			return 'Admin';
		}
		if ($name == 'GameRelation') {
			return 'GameRelation';
		}
		if ($name == 'gametype') {
			return 'Type';
		}
		if ($name == 'games') {
			return 'Game';
		}
		if ($name == 'game_type') {
			return 'GameType';
		}
		if ($name == 'history') {
			return 'AdminHistory';
		}
		if ($name == 'log_edit') {
			return 'LogEdit';
		}

	}
}