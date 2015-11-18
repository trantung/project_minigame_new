<?php
/* mm/dd/yyyy to Y-m-d H:i:s */
function convertDateTime($dateString, $paramString = '/')
{
	$array = explode($paramString,$dateString);
	$datetime = $array[2].'-'.$array[0].'-'.$array[1].' 00:00:00';
	return $datetime;
}
function getRole($roleId) {
	$role = array(
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
	);
	return $role[$roleId];
}

function selectRoleId()
{
	return array(
		'' => '-- Lựa chọn',
		ADMIN => 'ADMIN',
		EDITOR => 'EDITOR',
		SEO => 'SEO',
	);
}

function selectParentCategory()
{
	return array(
		MENU => 'Trên Menu',
		CONTENT => 'Dưới content',
	);
}

function textParentCategory($input){
	return array('placeholder' =>$input, 'class' =>'form-control');
}

function returnList($className)
{
	$list = $className::lists('name', 'id');
	return $list;
}

function getWeightNumberType($typeId, $parentId)
{
	$weightNumber = ParentType::where('type_id', $typeId)->where('category_parent_id', $parentId)->first();
	if ($weightNumber) {
		return $weightNumber->weight_number;
	}
	return NULL;
}
function checkBoxChecked($typeId, $parentId)
{
	$check = getWeightNumberType($typeId, $parentId);
	if (isset($check)) {
		return 'checked';
	}
	return NULL;
}

function saveScore()
{
	return array(
		1 => 'Lưu điểm',
		2 => 'Không lưu điểm'
		);
}

function checkBoxGame($gameId, $parentId)
{
	$check = GameRelation::where('game_id', $gameId)
						->where('category_parent_id', $parentId)
						->first();
	if (isset($check)) {
		return 'checked';
	}
	return NULL;
}

function countType($parentId)
{
	return count(ParentType::where('category_parent_id', $parentId)->get());
}

function countParentGame($parentId)
{
	return count(GameRelation::where('category_parent_id', $parentId)->get());
}

function countCategoryGame($categoryId)
{
	return count(Game::where('parent_id', $categoryId)->get());
}

function countCategoryView($categoryId)
{
	return Game::where('parent_id', $categoryId)->sum('count_view');
}
function countCategoryDownload($categoryId)
{
	return Game::where('parent_id', $categoryId)->sum('count_download');
}



