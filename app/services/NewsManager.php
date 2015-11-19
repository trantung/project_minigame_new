<?php
class NewsManager
{
	public static function seachNews($input)
	{
		$data = AdminNew::where(function ($query) use ($input)
		{
			if ($input['type_new_id'] != 0) {
				$query = $query->where('type_new_id', $input['type_new_id']);
			}
			if ($input['title']) {
				$query = $query->where('title', 'like', '%'.$input['title'].'%');
			}
			if($input['fdate']){
				$query = $query->where('start_date', '>=', $input['fdate']);
			}
			if($input['fdate']){
				$query = $query->where('start_date', '>=', $input['fdate']);
			}
			if($input['tdate']){
				$query = $query->where('start_date', '<=', $input['tdate']);
			}
		})->orderBy('id', 'asc')->paginate(PAGINATE);
		return $data;
	}

}