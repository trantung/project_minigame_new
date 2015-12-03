<?php
class CommonGame
{
	public static function uploadAction($fileUpload, $isFile = NULL, $issetFile = NULL, $isUnique = NULL)
	{
		if(Input::hasFile($fileUpload)){
			$file = Input::file($fileUpload);
			$filename = $file->getClientOriginalName();
			$extension = $file->getClientOriginalExtension();
			if(isset($isUnique)) {
				$filename = changeFileNameImage($filename);
			}
			if($isFile != '') {
				$pathUpload = self::getPathFile($extension);
			} else {
				$pathUpload = public_path().UPLOAD_GAME_AVATAR;
			}
			$uploadSuccess = $file->move($pathUpload, $filename);
		}
		if(isset($uploadSuccess)) {
			if(isset($isFile) && $extension == 'zip') {
				$pathUnzip = public_path().UPLOAD_GAME;
				Zipper::make($pathUpload.'/'.$filename)->extractTo($pathUnzip);
			}
			return $filename;
 		}
 		if($issetFile) {
 			return $issetFile;
 		}
	}

	public static function getPathFile($extension = null)
	{
		if($extension) {
			if($extension == 'zip') {
				return public_path().UPLOAD_GAMEZIP;
			}
			if($extension == 'swf') {
				return public_path().UPLOAD_FLASH;
			}
			if($extension == 'apk') {
				return public_path().UPLOAD_GAMEOFFLINE;
			}
		}
		return null;
	}

	public static function inputActionGame($id = NULL)
	{
		if($id) {
			$issetFile = self::getIssetFile($id, TRUE);
			$issetAvatar = self::getIssetFile($id);
		} else {
			$issetFile = '';
			$issetAvatar = '';
		}
		$inputGame = array();
		$inputGame['image_url'] = self::uploadAction('image_url', '', $issetAvatar,  IS_UPLOAD_UNIQUE);
		$inputGame['link_upload_game'] = self::uploadAction('link_upload_game', IS_UPLOAD_FILE, $issetFile);
		$inputGame['name'] = Input::get('name');
    	$inputGame['description'] = Input::get('description');
    	$inputGame['link_download'] = Input::get('link_download');
    	//check link upload game , link_url
    	if(Input::get('link_url')) {
    		$inputGame['link_url'] = Input::get('link_url');
    	} elseif(!Input::get('link_url') && $inputGame['link_upload_game']) {
    		$inputGame['link_url'] = getFilename($inputGame['link_upload_game']);
    	}
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
			// if($input['category_parent_id'] != '') {
			// 	$list = CategoryParent::find($input['category_parent_id'])->categoryparentrelations->lists('game_id');
			// 	$query = $query->whereIn('id', $list);
			// }
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
    public static function boxGameByCategoryParent($data, $paginate = null)
    {
    	$now = Carbon\Carbon::now();
    	$arrange = getArrange($data->arrange);
    	$game = $data->games->first();
    	if($game) {
    		if($paginate) {
    			if(getDevice() == MOBILE) {
    				$listGame = Game::where('parent_id', $game->id)
    					->where('parent_id', '!=', GAMEFLASH)
    					->where('start_date', '<=', $now)
    					->orderBy($arrange, 'desc')
    					->paginate(PAGINATE_LISTGAME);
    			} else {
    				$listGame = Game::where('parent_id', $game->id)
    					->where('start_date', '<=', $now)
    					->orderBy($arrange, 'desc')
    					->paginate(PAGINATE_LISTGAME);
    			}
    		} else {
    			if(getDevice() == MOBILE) {
    				$listGame = Game::where('parent_id', $game->id)
    					->where('parent_id', '!=', GAMEFLASH)
    					->where('start_date', '<=', $now)
    					->orderBy($arrange, 'desc')
    					->limit(PAGINATE_BOXGAME)->get();
    			} else {
    				$listGame = Game::where('parent_id', $game->id)
    					->where('start_date', '<=', $now)
    					->orderBy($arrange, 'desc')
    					->limit(PAGINATE_BOXGAME)->get();
    			}
    		}
    		return $listGame;
    	}
    	return null;
    }

    public static function boxGameByType($data, $paginate = null)
    {
    	$now = Carbon\Carbon::now();
		$games = Type::find($data->id)->gametypes->lists('game_id');
    	if($games) {
    		if($paginate) {
    			if(getDevice() == MOBILE) {
    				$listGame = Game::whereIn('id', $games)
                        ->where('parent_id', '!=', GAMEFLASH)
    					->where('parent_id', '!=', GAMEOFFLINE)
    					->where('start_date', '<=', $now)
    					->orderBy('id', 'desc')
    					->paginate(PAGINATE_LISTGAME);
    			} else {
    				$listGame = Game::whereIn('id', $games)
    					->where('start_date', '<=', $now)
                        ->where('parent_id', '!=', GAMEOFFLINE)
    					->orderBy('id', 'desc')
    					->paginate(PAGINATE_LISTGAME);
    			}
    		} else {
    			if(getDevice() == MOBILE) {
    				$listGame = Game::whereIn('id', $games)
    					->where('parent_id', '!=', GAMEFLASH)
                        ->where('parent_id', '!=', GAMEOFFLINE)
    					->where('start_date', '<=', $now)
    					->orderBy('id', 'desc')
    					->limit(PAGINATE_BOXGAME)->get();
    			} else {
    				$listGame = Game::whereIn('id', $games)
    					->where('start_date', '<=', $now)
                        ->where('parent_id', '!=', GAMEOFFLINE)
    					->orderBy('id', 'desc')
    					->limit(PAGINATE_BOXGAME)->get();
    			}
    		}
    		return $listGame;
    	}
    	return null;
    }

    // url game
    public static function getUrlGame($slug = null)
    {
    	$game = Game::findBySlug($slug);
    	if($game) {
    		$type = Type::find($game->type_main);
    		if($type) {
    			$url = url('/' . $type->slug . '/' . $slug . '.html');
				// return '/' . $type->slug . '/' . $slug . '.html';
				return $url;
    		} else {
    			dd('Đường dẫn sai');
    		}
    	} else {
    		return url('/');
    	}
    }

    // url download game
    public static function getUrlDownload($game = null)
    {
    	if($game) {
    		if($game->link_download != '') {
    			return $game->link_download;
    		} else {
    			return url(UPLOAD_GAMEOFFLINE . '/' . $game->link_upload_game);
    		}
    	}
    	return url('/');
    }

    // Other games by parent_id with limit
    public static function getRelateGame($parentId, $limit)
    {
    	$now = Carbon\Carbon::now();
    	if($parentId && $limit) {
    		if(getDevice() == MOBILE) {
    			$listGame = Game::where('parent_id', $parentId)
    				->where('start_date', '<=', $now)
    				->where('parent_id', '!=', GAMEFLASH)
    				->limit($limit)->get();
    		} else {
    			$listGame = Game::where('parent_id', $parentId)
    				->where('start_date', '<=', $now)
    				->limit($limit)->get();
    		}
    		return $listGame;
    	}
    	return null;
    }

    // link to file folder play game online
    public static function getLinkGame($game = null)
    {
		if($game) {
			// $ext = getExtension($game->link_upload_game);
			$filename = getFilename($game->link_upload_game);
    		if($game->parent_id == GAMEFLASH) {
    			if($game->link_url != '') {
					$link = url(UPLOAD_FLASH . '/' . $game->link_url . '.swf');
		    	} else {
		    		$link = url(UPLOAD_FLASH . '/' . $game->link_upload_game);
		    	}
		    	$box = self::getBoxGame($link, $game->parent_id);
    			return $box;
    		}
    		if($game->parent_id == GAMEHTML5) {
    			if($game->link_url != '') {
					$link = url(UPLOAD_GAME . '/' . $game->link_url);
		    	} else {
		    		$link = url(UPLOAD_GAME . '/' . $filename);
		    	}
		    	$box = self::getBoxGame($link, $game->parent_id);
    			return $box;
    		}
    	}
    	return null;
    }

    public static function getBoxGame($link, $parentId)
    {
    	if($parentId == GAMEFLASH) {
    		$style = self::getStyle();
    		$box = '<object style="' . $style . '">
					    <param name="movie" value="' . $link .'">
					    <embed src="' . $link .'">
					    </embed>
					</object>';
    		return $box;
    	}

        if(getDevice() == COMPUTER) {
            if($parentId == GAMEHTML5) {
                $box = '<iframe src="' . $link . '" style="position:fixed; top:0px; left:0px; bottom:0px; right:0px; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;" width="100%" height="100%" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" ></iframe>';
                return $box;
            }
        } else {
            if($parentId == GAMEHTML5) {
                $style = self::getStyle();
                $box = '<iframe src="' . $link . '" style="border:none; margin:0; padding:0; overflow:hidden; ' . $style . '" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true" ></iframe>';
                return $box;
            }
        }
    }

    //get link play game
    public static function getLinkPlayGame($game = null)
    {
        if($game) {
            // $ext = getExtension($game->link_upload_game);
            $filename = getFilename($game->link_upload_game);
            if($game->parent_id == GAMEFLASH) {
                if($game->link_url != '') {
                    $link = url(UPLOAD_FLASH . '/' . $game->link_url . '.swf');
                } else {
                    $link = url(UPLOAD_FLASH . '/' . $game->link_upload_game);
                }
                return $link;
            }
            if($game->parent_id == GAMEHTML5) {
                if($game->link_url != '') {
                    $link = url(UPLOAD_GAME . '/' . $game->link_url);
                } else {
                    $link = url(UPLOAD_GAME . '/' . $filename);
                }
                return $link;
            }
        }
        return null;
    }

    public static function getStyle()
    {
    	if(getDevice() == MOBILE) {
			$style = 'width: 100%; height: 100%;';
		} else {
			$style = 'width: 100%; height: 450px;';
		}
		return $style;
	}

    public static function getSlide()
    {
    	return AdminSlide::lists('name', 'id');
    }

    public static function getGameScore($gameId)
    {
    	$score = Score::where('game_id', $gameId)
    				->orderBy('score', 'desc')
    				->groupBy('user_id')
    				->limit(GAMESCORE_LIMITED)
    				->get();
    	if($score) {
    		return $score;
    	} else {
    		return null;
    	}
    }

}