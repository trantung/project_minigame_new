<?php

class ScoreManagerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


		$inputScore = self::getGameScore();
		// $score = self::getGameScore();
		// dd($score->toArray());
		return View::make('admin.score.index')->with(compact('inputScore'));
	}

   	public static function getGameScore()
    {
    	$score = Score::orderBy('score', 'desc')
    				->groupBy('game_id')
    				->groupBy('user_id')
    				->limit(GAMESCORE_LIMITED)
    				->orderBy('id', 'desc')->paginate(PAGINATE);
    	if($score) {
    		return $score;
    	} else {
    		return null;
    	}
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

	//search data
	public function search()
	{
		$input = Input::all();
		$inputScore = CommonSearch::searchScore($input);
		return View::make('admin.score.index')->with(compact('inputScore'));
	}
}
