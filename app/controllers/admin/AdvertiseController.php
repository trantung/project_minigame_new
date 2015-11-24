<?php

class AdvertiseController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$advertise = Advertise::where('position', '!=', CHILD_PAGE)->get();
		return View::make('admin.adverties.index')->with(compact('advertise'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.adverties.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::except('_token');
		$id = Advertise::create($input)->id;
		$imageUrl = CommonSeo::uploadImage($id, UPLOAD_ADVERTISE, 'image_url', 'header');
		Advertise::find($id)->update(array('image_url' => $imageUrl));
		return Redirect::action('AdvertiseController@index')->with('message', 'tạo mới thành công');
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
		return View::make('admin.adverties.edit')->with(compact('advertise'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::except('_token', '_method');
		$advertise = Advertise::find($id);
		$imageUrl = CommonSeo::uploadImage($id, UPLOAD_ADVERTISE, 'image_url', 'header', $advertise->image_url);
		$input['image_url'] = $imageUrl;
		$advertise->update($input);
		return Redirect::action('AdvertiseController@index')->with('message', 'Thay đổi thành công');
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
		return Redirect::action('AdvertiseController@index')->with('message', 'Xoá thành công');
	}

	public function indexChild()
	{
		$advertisePosition = AdvertisePosition::all();
		return View::make('admin.adverties.child_index')->with(compact('advertisePosition'));
	}

	public function createChild()
	{
		return View::make('admin.adverties.child_create');
	}
	public function storeChild()
	{
		$input = Input::except('_token');
		dd($input);

	}
	public function editChild($id)
	{
		dd(55);
	}
	public function updateChild($id)
	{
		dd(6);
	}
	public function destroyChild($id)
	{
		dd(555);
	}

}
