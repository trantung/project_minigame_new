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
    	$inputGame['link_download'] = Input::get('link_download');
    	$inputGame['link_url'] = Input::get('link_url');
    	$inputGame['parent_id'] = Input::get('parent_id');
    	$inputGame['weight_number'] = Input::get('weight_number');
    	$inputGame['start_date'] = Input::get('start_date');
    	if($inputGame['start_date'] == '') {
    		$inputGame['start_date'] = date('m/d/Y');
    	}
    	$inputGame['status'] = Input::get('status');
    	$inputGame['score_status'] = Input::get('score_status');
    	$inputGame['gname'] = Input::get('gname');
    	$inputGame['slide_id'] = Input::get('slide_id');
    	$inputGame['type_main'] = Input::get('type_main');
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

	public static function searchAdminGame($input)
	{
		$orderBy = self::searchAdminGameSortBy($input);
		$data = Game::where(function ($query) use ($input) {
			if ($input['keyword'] != '') {
				$query = $query->where('name', 'like', '%'.$input['keyword'].'%');
			}
			if($input['parent_id'] != '') {
				$query = $query->where('parent_id', $input['parent_id']);
			}
			if($input['parent_id'] == '') {
				$query = $query->whereNotNUll('parent_id');
			}
			if($input['category_parent_id'] != '') {
				$list = CategoryParent::find($input['category_parent_id'])->categoryparentrelations->lists('game_id');
				$query = $query->whereIn('id', $list);
			}
			if($input['type_id'] != '') {
				$listType = Type::find($input['type_id'])->gametypes->lists('game_id');
				$query = $query->whereIn('id', $listType);
			}
			if($input['status'] != '') {
				$query = $query->where('status', $input['status']);
			}
			if($input['start_date'] != ''){
				$query = $query->where('start_date', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('start_date', '<=', $input['end_date']);
			}
		})
		// ->get()->toArray();
		// dd($data);
		->orderBy($orderBy[0], $orderBy[1])
		->paginate(PAGINATE);
		//dd(DB::getQueryLog());
		return $data;
	}

	public static function searchAdminGameSortBy($input)
	{
		$sortBy = 'id';
		$sort = 'desc';
		if($input['sortByCountView'] != '') {
			if($input['sortByCountView'] == 'count_view_asc') {
				$sortBy = 'count_view';
				$sort = 'asc';
			}
			if($input['sortByCountView'] == 'count_view_desc') {
				$sortBy = 'count_view';
				$sort = 'desc';
			}
		}
		if($input['sortByCountPlay'] != '') {
			if($input['sortByCountPlay'] == 'count_play_asc') {
				$sortBy = 'count_play';
				$sort = 'asc';
			}
			if($input['sortByCountPlay'] == 'count_play_desc') {
				$sortBy = 'count_play';
				$sort = 'desc';
			}
		}
		if($input['sortByCountVote'] != '') {
			if($input['sortByCountVote'] == 'count_vote_asc') {
				$sortBy = 'count_vote';
				$sort = 'asc';
			}
			if($input['sortByCountVote'] == 'count_vote_desc') {
				$sortBy = 'count_vote';
				$sort = 'desc';
			}
		}
		if($input['sortByCountDownload'] != '') {
			if($input['sortByCountDownload'] == 'count_download_asc') {
				$sortBy = 'count_download';
				$sort = 'asc';
			}
			if($input['sortByCountDownload'] == 'count_download_desc') {
				$sortBy = 'count_download';
				$sort = 'desc';
			}
		}
		return [$sortBy, $sort];
	}


	// get games, orderBy arrange category parent, paging
    public static function boxGameByCategoryParent($data)
    {
    	//$arrange = getArrange($data->arrange);
        //return $data->games->orderBy('weight_number', 'desc')->take(12);
    }

}