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

	public static function createParentType($arrayTypeId, $arrayWeightNumber, $parentId)
	{
		$input = array();
		if ($arrayTypeId) {
			foreach ($arrayTypeId as $value) {
				$input = self::commonInputParentType($arrayWeightNumber, $value, $parentId);
				ParentType::create($input);
			}
		}
		
	}
	public static function updateParentType($arrayTypeId, $arrayWeightNumber, $parentId)
	{
		$listId = ParentType::where('category_parent_id', $parentId)->lists('id');
		foreach ($listId as $listId){
			ParentType::destroy($listId);
		}
		self::createParentType($arrayTypeId, $arrayWeightNumber, $parentId);
	}

	public static function commonInputParentType($arrayWeightNumber, $typeId, $parentId)
	{
		$input = array();
		$input['weight_number'] = $arrayWeightNumber[$typeId];
		$input['type_id'] = $typeId;
		$input['category_parent_id'] = $parentId;
		return $input;
	}

}
