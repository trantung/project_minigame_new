<?php

class NewsIndexController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputNew = AdminNew::where('index', ACTIVE)
			->where('status', '!=', SCRATCH_PAPER)
			->where('status', '!=', REJECT)
			->where('status', '!=', BACK)
			->orderByRaw("weight_number = '0', weight_number")
			->orderBy('start_date', 'desc')
			->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.newsindex.index')->with(compact('inputNew'));
	}

	public function search()
	{
		$input = Input::all();
		$input['isIndex'] = 1;
		$inputNew = NewsManager::searchNews($input);
		return View::make('admin.newsindex.index')->with(compact('inputNew'));
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

	// Edit weight number and status game index page
	public function updateIndexData()
	{
		$boxId = Input::get('box_id');
		$status = Input::get('status');
		$weightNumber = Input::get('weight_number');
		foreach($boxId as $key => $value) {
			$input = array(
				'weight_number' => $weightNumber[$key],
				'status' => $status[$key],
				);
			AdminNew::find($value)->update($input);
		}
		dd(1);
	}

	public function remove($id)
	{
		AdminNew::find($id)->update(['index' => INACTIVE]);
		return Redirect::action('NewsIndexController@index')->with('message', 'Đã loại bỏ');
	}

}
