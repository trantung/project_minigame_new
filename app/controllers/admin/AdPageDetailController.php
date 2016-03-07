<?php 

class AdPageDetailController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advertise = Advertise::where('model_name', 'AdminNew')
			->whereNull('relate_id')->get();
		return View::make('admin.ad_page_detail.destop.index')->with(compact('advertise'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$catelogies = AdminNew::all();
		return View::make('admin.ad_page_detail.destop.create')->with(compact('catelogies'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$input['model_name'] = 'AdminNew';
		$id = Advertise::create($input)->id;
		return Redirect::action('AdPageDetailController@index');
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
		$ad = Advertise::find($id);
		return View::make('admin.ad_page_detail.destop.edit')->with(compact('ad'));
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
		return Redirect::action('AdPageDetailController@index');
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
		return Redirect::action('AdPageDetailController@index');
	}


}
