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

	public function listGame($slug, $page = 1)
	{
		$categoryParent = CategoryParent::findBySlug($slug);
		$type = Type::findBySlug($slug);
		if($categoryParent) {
			$games = CommonGame::boxGameByCategoryParent($categoryParent);
			// $categoryParentId = $categoryParent->id;
			// $arrange = getArrange($categoryParent->arrange);
			// $games = Game::where('parent_id', $categoryParent->id)->orderBy($arrange, 'desc')->paginate(1);
			// // $games = $categoryParent->games->sortByDesc($arrange);
			return View::make('site.game.category')->with(compact('games', 'categoryParent'));
		}
		if($type) {
			// return View::make('site.game.type')->with(compact('data'));
		}
	}

	public function detailGame($type, $slug)
	{
		// http://minigame.de/be-trai/game-ban-ga-hay-va-chan.html
		$game = Game::findBySlug($slug);
		// $type = Type::findBySlug($slug);
		return View::make('site.game.gameDownload')->with(compact('game'));
	}

}
