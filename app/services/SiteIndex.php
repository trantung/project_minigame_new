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

    public static function getFieldByType($typeId, $field)
    {
        if (Cache::has('type_'.$typeId.$field))
        {
            $result = Cache::get('type_'.$typeId.$field);
        } else {
            $result = Type::find($typeId)->$field;
            Cache::put('type_'.$typeId.$field, $result, CACHETIME);
        }
        return $result;
    }

    public static function getTypeAll()
    {
        if (Cache::has('getTypeAll'))
        {
            $result = Cache::get('getTypeAll');
        } else {
            $result = Type::all();;
            Cache::put('getTypeAll', $result, CACHETIME);
        }
        return $result;
    }

}