<?php
function selectParentCategory()
{
	return array(
		MENU => 'Trên Menu', 
		CONTENT => 'Dưới content',
		);
}

function textPerentCategory($input){
	return array('placeholder' =>$input, 'class' =>'form-control');
}
//count game of parent category and category: $countGameCategoryParentCategory
function countGameCategoryParentCategory($categoryParentId)
{
	$games = CategoryParent::find($categoryParentId)->games;
	return count($games);
}
//count game of category only: $countGameCategoryOnly
function countGameCategoryOnly($parentId)
{
	$games = Games::where('parent_id', $parentId)->get();
	return count($games);
}
//count game of parent category only: $countGameCategoryParentOnly
function countGameCategoryParentOnly($categoryParentId)
{
	$games = CategoryParent::find($categoryParentId)->categoryparentrelations;
	$count = 0;
	foreach ($games as $game) {
		if (Game::find($game->game_id)->parent_id == GAME_OF_PARENT) {
			$count ++;
		}
	}
	return $count;
}
//count category: $countCategory = $countGameCategoryParentCategory - $countGameCategoryParent
function countCategory($categoryParentId)
{
	$countGameCategoryParentCategory = countGameCategoryParentCategory($categoryParentId);
	$countGameCategoryParent = countGameCategoryParentOnly($categoryParentId);
	$countCategory = $countGameCategoryParentCategory - $countGameCategoryParent;
	return $countCategory;

}
//count total: $countTotal = $countGameCategoryParentCategory + $countGameCategoryOnly
function countTotal($categoryParentId)
{
	$countGameCategoryParentCategory = countGameCategoryParentCategory($categoryParentId);
	$parentIds = GameRelation::
	$countGameCategoryOnly = countGameCategoryOnly($parentId);

}

function countGame($categoryParentId, $modelName)
{ 
	$games = $modelName::find($categoryParentId)->games;
	$countGame = array();
	$countCategory = array();
	foreach ($games as $game) {
		if ($game->parent_id != NULL) {
			$countGame[$game->id] = $game->name;
		}
	}
	return count($countGame);
}

function countCategory($categoryParentId, $modelName)
{
	$countGame = countGame($categoryParentId, $modelName);
	$countTotal = countTotal($categoryParentId, $modelName);
	$countCategory = $countTotal - $countGame;
	return $countCategory;
}

function countTotal($categoryParentId, $modelName)
{
	$games = $modelName::find($categoryParentId)->games;
	return count($games);
}