<?php
class CommonGame
{
	public static function insertRelationshipGame($input, $param, $name, $id)
	{
		if($input) {
			foreach($input as $key => $value) {
				if ($value) {
					CommonNormal::create(array($param => $value, 'game_id' => $id), $name);
				}
			}
		}
	}

	public static function updateRelationshipGame($input, $param, $name, $id, $modelName)
	{
		$listId = $modelName::where('game_id', $id)->lists('id');
		foreach ($listId as $listId){
			$modelName::destroy($listId);
		}
		self::insertRelationshipGame($input, $param, $name, $id);
	}

	public static function uploadAction($fileUpload, $pathUpload, $isFile = NULL, $issetFile = NULL, $isUnique = NULL)
	{
		if(Input::hasFile($fileUpload)){
			$file = Input::file($fileUpload);
			$filename = $file->getClientOriginalName();
			if(isset($isUnique)) {
				$filename = changeFileNameImage($filename);
			}
			$uploadSuccess = $file->move($pathUpload, $filename);
		}
		if(isset($uploadSuccess)) {
			if(isset($isFile)) {
				Zipper::make($pathUpload.'/'.$filename)->extractTo($pathUpload);
			}
			return $filename;
 		}
 		if($issetFile) {
 			return $issetFile;
 		}

	}

	public static function inputActionGame($pathAvatar, $pathUpload, $id = NULL)
	{
		if($id) {
			$issetFile = self::getIssetFile($id, TRUE);
			$issetAvatar = self::getIssetFile($id);
		} else {
			$issetFile = '';
			$issetAvatar = '';
		}
		$inputGame = array();
		$inputGame['image_url'] = self::uploadAction('image_url', $pathAvatar, '', $issetAvatar,  IS_UPLOAD_UNIQUE);
		$inputGame['link_upload_game'] = CommonGame::uploadAction('link_upload_game', $pathUpload, IS_UPLOAD_FILE, $issetFile);
		$inputGame['name'] = Input::get('name');
    	$inputGame['description'] = Input::get('description');
    	$inputGame['link_url'] = Input::get('link_url');
    	$inputGame['parent_id'] = Input::get('parent_id');
    	$inputGame['weight_number'] = Input::get('weight_number');
    	$inputGame['start_date'] = Input::get('start_date');
    	$inputGame['score_status'] = Input::get('score_status');
    	$inputGame['slide_id'] = Input::get('slide_id');
    	return $inputGame;
	}

	public static function getIssetFile($id, $isFile = NULL)
	{
		if($isFile){
			$result = Game::find($id)->link_upload_game;
		} else {
			$result = Game::find($id)->image_url;
		}
		if ($result) {
			return $result;
		}
		return NULL;
	}

}