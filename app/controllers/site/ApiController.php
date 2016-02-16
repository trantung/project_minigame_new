<?php

class ApiController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// $types = Type::all();
		$typeIdBlack = array(3);
		$types = Type::whereNotIn('id', $typeIdBlack)->get();
		foreach ($types as $key => $type) {
		$data[$key]['type_name'] = $type->name;
		$data[$key]['data_type'] = $this->getGame($type);
		}
		return Response::json(array('code' => 'ok', 'data' => $data));
	}

	public function getGame($type)
	{
		$now = Carbon\Carbon::now();
		$typeIdBlack = array(3);
		$listGameBlack = array(84, 79, 76, 81, 24, 80, 68, 21, 74, 71, 69, 70, 28, 220, 209, 37, 26, 83, 86, 85, 46);
		$list = array();
		$listGame = DB::table('games')
		                    ->join('game_types', 'game_types.game_id', '=', 'games.id')
		                    ->join('types', 'types.id', '=', 'game_types.type_id')
		                    ->select('games.name', 'games.link_url', 'games.image_url', 'games.screen')
		                    ->distinct()
		                    ->where('types.id', $type->id)
		                    ->whereNull('games.deleted_at')
		                    ->where('games.status', ENABLED)
		                    ->where('games.parent_id', '=', GAMEHTML5)
		                    ->where('games.start_date', '<=', $now)
		                    ->whereNotIn('types.id', $typeIdBlack)
		                    ->whereNotIn('games.id', $listGameBlack)
		                    ->get();
		    foreach ($listGame as $key => $value) {
		     $avatar = url(UPLOAD_GAME_AVATAR. '/' .$value->image_url);
		     $list[$key]['game_url'] = url(UPLOAD_GAME. '/' . $value->link_url);
		     $list[$key]['game_name'] = $value->name;
		     $list[$key]['game_avatar'] = $avatar;
		     $list[$key]['game_screen'] = $value->screen;
		    }
		return $list;
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
