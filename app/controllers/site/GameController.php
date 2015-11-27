<?php

class GameController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
		return $this->getViewGame($game->parent_id, $game);
	}

	public function getViewGame($parentId, $game)
    {
    	if($parentId && $game) {
    		if($parentId == GAMEOFFLINE) {
    			return View::make('site.game.download')->with(compact('game'));
    		} else {
    			return View::make('site.game.online')->with(compact('game'));
    		}
    	}
    }

}
