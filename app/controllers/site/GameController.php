<?php

class GameController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function listGame($slug)
	{
		$categoryParent = CategoryParent::findBySlug($slug);
		$type = Type::findBySlug($slug);
		if($categoryParent) {
			$games = CommonGame::boxGameByCategoryParent($categoryParent, true);
			return View::make('site.game.category')->with(compact('games', 'categoryParent'));
		}
		if($type) {
			$games = CommonGame::boxGameByType($type, true);
			return View::make('site.game.type')->with(compact('games', 'type'));
		}
	}

	public function detailGame($type, $slug)
	{
		// http://minigame.de/be-trai/game-ban-ga-hay-va-chan.html
		$game = Game::findBySlug($slug);
		$play = Input::get('play');
		if($game) {
			$count_view = $game->count_view+1;
			$game->update(array('count_view' => $count_view));
			if(getDevice() == COMPUTER) {
				$count_play = $game->count_play+1;
				$game->update(array('count_play' => $count_play));
			}
 			return $this->getViewGame($game->parent_id, $game, $play);
		}
		dd('Game không tồn tại');
	}

	public function getViewGame($parentId = null, $game = null, $play = null)
    {
    	if($parentId && $game) {
    		if(getDevice() == MOBILE) {
    			if($parentId == GAMEOFFLINE) {
	    			return View::make('site.game.downloadmobile')->with(compact('game'));
	    		} else {
	    			if($play == 'true') {
	    				return View::make('site.game.onlinemobileplay')->with(compact('game'));
	    			}
	    			return View::make('site.game.onlinemobile')->with(compact('game'));
	    		}
    		} else {
    			if($parentId == GAMEOFFLINE) {
	    			return View::make('site.game.downloadweb')->with(compact('game'));
	    		} else {
	    			return View::make('site.game.onlineweb')->with(compact('game'));
	    		}
    		}
    	}
    }

    public function voteGame()
    {
    	$input = array();
    	$input['game_id'] = Input::get('id');
    	$input['vote_rate'] = Input::get('rate');
    	GameVote::create($input);
    	$voteCount = GameVote::where('game_id', $input['game_id'])->count();
    	$voteAverage = GameVote::where('game_id', $input['game_id'])->avg('vote_rate');
    	$inputGame = array();
    	$inputGame['count_vote'] = $voteCount;
    	$inputGame['vote_average'] = round($voteAverage);
    	Game::find($input['game_id'])->update($inputGame);
    	dd(1);
    }
    /*
    * Get list game android
    * @ return listAndroid
    */
    public function getListGameAndroid(){
    	$inputGameandroi = Game::where('parent_id', GAMEOFFLINE)->paginate(PAGINATE_BOXGAME);
    	return View::make('site.game.showlistandroid')->with(compact('inputGameandroi'));
    }
    

    public function countPlay()
    {
    	$id = Input::get('id');
    	$game = Game::find($id);
    	if($game) {
    		$count_play = $game->count_play+1;
			$game->update(array('count_play' => $count_play));
    	}
    	dd(1);
    }

    public function countDownload()
    {
    	$id = Input::get('id');
    	$game = Game::find($id);
    	if($game) {
    		$count_download = $game->count_download+1;
			$game->update(array('count_download' => $count_download));
    	}
    	dd(1);
    }

}
