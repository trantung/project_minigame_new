<?php
class SiteIndex
{
	public static function getTypeOfParent($parentId)
	{
		$listTypeId = ParentType::where('category_parent_id', $parentId)->orderBy('weight_number', 'asc')->lists('type_id');
		return $listTypeId;
	}
}