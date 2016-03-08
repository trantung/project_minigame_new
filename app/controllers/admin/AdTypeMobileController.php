<?php

class AdTypeMobileController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advertise = Advertise::where('is_mobile', IS_MOBILE)
			->where('model_name', 'Type')
			->whereNull('relate_id')
			->get();
		return View::make('admin.ad.type.index')->with(compact('advertise'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$typeGame = AdCommon::getTypeNameGame();
		return View::make('admin.ad.type.create')->with(compact('typeGame'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$input['model_name'] = 1;
		$input['model_id'] = 1;
		$id = Advertise::create($input)->id;
		return Redirect::action('AdTypeMobileController@index')->with('message', 'tạo mới thành công');
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
		$advertise = Advertise::find($id);
		$typeGame = AdCommon::getTypeNameGame();
		return View::make('admin.ad.type.edit')->with(compact('advertise', 'typeGame'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token');
		$advertise = Advertise::find($id);
		$advertise->update($input);
		return Redirect::action('AdTypeMobileController@index')->with('message', 'Thay đổi thành công');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Advertise::find($id)->delete();
		return Redirect::action('AdTypeMobileController@index')->with('message', 'Xoá thành công');
	}


}
