<?php 

class AdGameMiniMobileController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advertise = Advertise::where('model_name', 'CategoryParent')
			->where('is_mobile', IS_MOBILE)
			->whereNull('relate_id')->get();
		return View::make('admin.ad_game_mini.mobile.index')->with(compact('advertise'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categoryParent = AdCommon::getCategoryParentAdvertise();
		return View::make('admin.ad_game_mini.mobile.create')->with(compact('categoryParent'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$input['model_name'] = 'CategoryParent';
		$id = Advertise::create($input)->id;
		return Redirect::action('AdGameMiniMobileController@index');
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
		$categoryParent = AdCommon::getCategoryParentAdvertise();
		return View::make('admin.ad_game_mini.mobile.edit')->with(compact('advertise', 'categoryParent'));
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
		Advertise::find($id)->update($input);
		return Redirect::action('AdGameMiniMobileController@index');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Advertise::find($id)->destroy($id);
		return Redirect::action('AdGameMiniMobileController@index');
	}


}
