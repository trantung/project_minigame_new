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

	public function search()
	{
		$input = Input::all();
		// if (!$input['keyword']) {
		// 	return Redirect::action('AdminGameController@index');
		// }
		$data = CommonGame::searchAdminGame($input);
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
			'parent_id' => 'required',
		);
		if(Input::get('score_status') == SAVESCORE) {
			$rules['gname'] = 'required';
		}
		if(Input::file('link_upload_game') == NULL && Input::get('parent_id') != GAMEOFFLINE) {
			$rules['link_url'] = 'required';
		}

		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminGameController@create')
	            ->withErrors($validator)->withInput($input);
        } else {

        	//upload avatar
        	$pathAvatar = public_path().UPLOAD_GAME_AVATAR;

        	//upload game file
        	if($input['parent_id'] == GAMEOFFLINE) {
        		$pathUpload = public_path().UPLOAD_GAMEOFFLINE;
        	} else {
        		$pathUpload = public_path().UPLOAD_GAMEONLINE;
        	}

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
			CommonLog::insertLogEdit('Game', $id, $history_id, CREATE);

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
		if(!Admin::isSeo()){
			return View::make('admin.game.edit')->with(compact('inputGame', 'inputSeo'));
		} else {
			return View::make('admin.game.editForSeo')->with(compact('inputGame', 'inputSeo'));
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!Admin::isSeo()) {
			$rules = array(
				'name' => 'required',
				'parent_id' => 'required',
			);
			if(Input::get('score_status') == SAVESCORE) {
				$rules['gname'] = 'required';
			}
			if(Input::file('link_upload_game') == NULL && Input::get('parent_id') != GAMEOFFLINE) {
				$rules['link_url'] = 'required';
			}
		} else {
			$rules = array();
		}

		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminGameController@edit', $id)
	            ->withErrors($validator)
	            ->withInput($input);
        } else {
        	$data = Game::find($id);

        	//SEO cant update game
        	if(!Admin::isSeo()) {

	        	//upload avatar
	        	$pathAvatar = public_path().UPLOAD_GAME_AVATAR;

	        	//upload game file
	        	if($input['parent_id'] == GAMEOFFLINE) {
	        		$pathUpload = public_path().UPLOAD_GAMEOFFLINE;
	        	} else {
	        		$pathUpload = public_path().UPLOAD_GAMEONLINE;
	        	}

				$inputGame = CommonGame::inputActionGame($pathAvatar, $pathUpload, $id);

				//update slide_id

	        	//update game
				CommonNormal::update($id, $inputGame);

				//update game_types: type_id, game_id
				CommonGame::updateRelationshipGame(Input::get('type_id'), 'type_id', 'game_type', $id, 'GameType');

				//update game_category_parents: category_parent_id, game_id
				CommonGame::updateRelationshipGame(Input::get('category_parent_id'), 'category_parent_id', 'GameRelation', $id, 'GameRelation');

			}

			//update histories: model_name, model_id, last_time, device, last_ip
			$history_id = CommonLog::updateHistory('Game', $id);

			//update log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
			CommonLog::insertLogEdit('Game', $id, $history_id, EDIT);

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

	public function history($id)
	{
		$historyId = CommonLog::getIdHistory('Game', $id);
		if ($historyId) {
			$history = AdminHistory::find($historyId);
			$logEdit = $history->logedits;
			return View::make('admin.game.history')->with(compact('history', 'logEdit'));
		}
		return Redirect::action('AdminGameController@index')->with('message', 'Lịch sử game này đã bị xoá');
		
	}

	public function deleteHistory($id)
	{
		$history = AdminHistory::find($id);
		if ($history) {
			$history->logedits()->where('history_id', $id)->delete();
			$history->delete();
			return Redirect::action('AdminGameController@index')->with('message', 'Xoá lịch sử thành công');
		}
		return Redirect::action('AdminGameController@index');
	}

	public function deleteSelected()
	{

	}

	public function updateWeightNumber()
	{

	}

}
