<?php
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
		1 => 'Luu diem',
		2 => 'Khong luu diem'
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

//count game or category in the game_category_parent table: $total
function countTotalGameInParent($parentId)
{
	return count(CategoryParent::find($parentId)->games);
}
//count game in the category: $countGameInCategory
function countGameInCategory($categoryId)
{
	return count(Game::where('parent_id', $categoryId)->get());
}
//count game in the direct parent category
function countGameInOnlyParent($parentId)
{
	$listGameId = GameRelation::where('parent_id', $parentId)->lists('game_id');
	Game::where('parent_id', $categoryId);
}