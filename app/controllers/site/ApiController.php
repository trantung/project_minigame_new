<?php

class ApiController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct(Game $game)
	{
		$this->game = $game;
	}
	public function index()
	{
		$now = Carbon\Carbon::now();
		$types = Type::all();
		$data = array();
		foreach ($types as $key => $type) {
			foreach ($type->games as $k => $value) {
				if ($value->status == ENABLED && $value->start_date < $now && $value->parent_id == GAMEHTML5) {
					$type_slug = Type::find(Game::find($value->id)->type_main)->slug;
					$slug = $value->slug;
					// $url = url('/' . $type_slug . '/' . $slug);
					$url = url(UPLOAD_GAME. '/' . $value->link_url);
					$avatar = url(UPLOAD_GAME_AVATAR. $value->image_url);
					$data[$key]['type_name'] = $type->name;
					$data[$key]['data_type'][$k]['game_url'] = $url;
					$data[$key]['data_type'][$k]['game_name'] = $value->name;
					$data[$key]['data_type'][$k]['game_avatar'] = $avatar;
				}
			}
		}
		return Response::json(array('code' => 'ok', 'data' => $data));
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
