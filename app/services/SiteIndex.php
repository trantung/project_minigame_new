<?php
class SiteIndex
{
	public static function getTypeOfParent($parentId)
	{
		if (Cache::has('listTypeId'.$parentId))
        {
            $listTypeId = Cache::get('listTypeId'.$parentId);
        } else {
        	$listTypeId = ParentType::where('category_parent_id', $parentId)->orderBy('weight_number', 'asc')->lists('type_id');
            Cache::put('listTypeId'.$parentId, $listTypeId, CACHETIME);
        }
		return $listTypeId;
	}
}