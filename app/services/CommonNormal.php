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
		$id = $name::create($input)->id;
		return $id;
	}

	public static function commonName($name = NULL)
	{
		if ($name == NULL) {
			$name = Request::segment(2);
		}
		if ($name == 'category_parent') {
			return 'CategoryParent';
		}
		if ($name == 'manager') {
			return 'Admin';
		}
	}
	
}