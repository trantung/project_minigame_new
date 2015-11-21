<?php
class RelationBox
{
	public static function getNameBoxAbove($input)
	{
		$className = $input->model_name;
		$name = $className::find($input->model_id)->name;
		return $name;
	}
}