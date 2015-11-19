<?php
class NewsManager
{
	public static function seachNews($input)
	{
		$data = AdminNew::where(function ($query) use ($input)
		{

		})->orderBy('id', 'asc')->paginate(PAGINATE);
		return $data;
	}

}