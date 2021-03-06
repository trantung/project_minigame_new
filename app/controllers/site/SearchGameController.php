<?php 

class SearchGameController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$input = Input::all();
		$inputsearchGame = CommonSearch::searchGame($input);
		$inputsearchNews = CommonSearch::searchNews($input);
		return View::make('site.game.searchgame')->with(compact('inputsearchGame', 'inputsearchNews', 'input'));
	}

	public function indexGame($keyword)
	{
		$input['search'] = $keyword;
		$inputsearchGame = CommonSearch::searchGame($input, 1);
		$inputsearchNews = array();
		return View::make('site.game.searchgame')->with(compact('inputsearchGame', 'inputsearchNews', 'input'));
	}

	public function indexNew($keyword)
	{
		$input['search'] = $keyword;
		$inputsearchGame = array();
		$inputsearchNews = CommonSearch::searchNews($input, 1);
		return View::make('site.game.searchgame')->with(compact('inputsearchGame', 'inputsearchNews', 'input'));
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


}
