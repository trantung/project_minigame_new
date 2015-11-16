<?php
class AdminManager
{
	public static function searchUserOperation($input)
	{
		$users = Admin::where(function ($query) use ($input){
			if ($input['role_id']) {
				$query = $query->where('role_id', $input['role_id']);
			}
			if ($input['keyword']) {
				$query = $query->where('email', 'like', '%'.$input['keyword'].'%')
								->orWhere('username', 'like', '%'.$input['keyword'].'%');
			}
		})->orderBy('id', 'asc')->paginate(PAGINATE);
		return $users;
	}
}