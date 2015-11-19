<?php

class AdminGameController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Game::where('parent_id', '!=', '')->orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.game.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.game.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminGameController@create')
	            ->withErrors($validator);
        } else {

        	//upload avatar
        	$pathAvatar = public_path().UPLOAD_GAME_AVATAR;

        	//upload game file
        	$pathUpload = public_path().UPLOAD_GAME;

        	// $folderName = substr($filename, 0, -4);
        	//unzip game file , public/games/link_url/
        	// $result = File::makeDirectory($pathUpload.'/'.$folderName, 0755);

			$inputGame = CommonGame::inputActionGame($pathAvatar, $pathUpload);

			//insert slide_id

        	//insert game
			$id = CommonNormal::create($inputGame);

			//insert game_types: type_id, game_id
			CommonGame::insertRelationshipGame(Input::get('type_id'), 'type_id', 'game_type', $id);

			//insert game_category_parents: category_parent_id, game_id
			CommonGame::insertRelationshipGame(Input::get('category_parent_id'), 'category_parent_id', 'GameRelation', $id);

			//insert histories: model_name, model_id, last_time, device, last_ip
			$history_id = CommonLog::insertHistory('Game', $id);

			//insert log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
			CommonLog::insertLogEdit('Game', $id, $history_id);

			//SEO
			CommonSeo::createSeo('Game', $id, FOLDER_SEO_GAME);

			return Redirect::action('AdminGameController@index') ;
        }
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
		$inputGame = Game::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'Game')->first();
		return View::make('admin.game.edit')->with(compact('inputGame', 'inputSeo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'name' => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminGameController@edit', $id)
	            ->withErrors($validator);
        } else {
        	$data = Game::find($id);
        	$inputGameTypes = array();
        	$inputGameCategoryParents = array();

        	//upload avatar
        	$pathAvatar = public_path().UPLOAD_GAME_AVATAR;

        	//upload game file
        	$pathUpload = public_path().UPLOAD_GAME;

			$inputGame = CommonGame::inputActionGame($pathAvatar, $pathUpload);

			//update slide_id

        	//update game
			CommonNormal::update($id, $inputGame);

			dd(12);

			//update game_types: type_id, game_id
			$inputGameTypes['type_id'] = Input::get('type_id');
			CommonGame::updateRelationshipGame($inputGameTypes['type_id'], 'type_id', 'game_type', $id);

			//update game_category_parents: category_parent_id, game_id


			//update histories: model_name, model_id, last_time, device, last_ip


			//update log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip

			//SEO
			CommonSeo::updateSeo('Game', $id, FOLDER_SEO_GAME);

			return Redirect::action('AdminGameController@index') ;
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
        return Redirect::action('AdminGameController@index');
	}


}
