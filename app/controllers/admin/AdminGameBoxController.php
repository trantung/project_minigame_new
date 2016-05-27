<?php

class AdminGameBoxController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Game::where('parent_id', '!=', '')
			->where('index', '>', INACTIVE)
			->orderBy('start_date', 'desc')
			->paginate(PAGINATE);
		return View::make('admin.gamebox.index')->with(compact('data'));
	}

	public function search()
	{
		$input = Input::all();
		$input['isGameBox'] = 1;
		$data = CommonGame::searchAdminGame($input);
		return View::make('admin.gamebox.index')->with(compact('data'));
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

	public function remove($id)
	{
		Game::find($id)->update(['index' => INACTIVE]);
		return Redirect::action('AdminGameBoxController@index')->with('message', 'Đã loại bỏ');
	}

	public function exportGameBoxHtml()
	{
		$gameCode1_pc = CommonGame::gameCode1(1, 1);
		$gameCode1_mobile = CommonGame::gameCode1(0, 1);
		$gameCode2_pc = CommonGame::gameCode2(1, 1);
		$gameCode2_mobile = CommonGame::gameCode2(0, 1);
		file_put_contents(public_path().FOLDER_GAMECODE.'/gamecode1_pc.html', $gameCode1_pc);
		file_put_contents(public_path().FOLDER_GAMECODE.'/gamecode1_mobile.html', $gameCode1_mobile);
		file_put_contents(public_path().FOLDER_GAMECODE.'/gamecode2_pc.html', $gameCode2_pc);
		file_put_contents(public_path().FOLDER_GAMECODE.'/gamecode2_mobile.html', $gameCode2_mobile);
		return Redirect::action('AdminGameBoxController@index')->with('message', 'Đã lưu');
	}

}
