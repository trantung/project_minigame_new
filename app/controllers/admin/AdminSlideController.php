<?php

class AdminSlideController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = AdminSlide::orderBy('id', 'asc')->paginate(PAGINATE_SLIDE);
		return View::make('admin.slider.index')->with(compact('slides'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.slider.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$input = Input::except('_token', 'image_url');
		$input['type_name'] = SLIDE_TYPE_NAME;
		$slideId = AdminSlide::create($input)->id;
		$inputAll = Input::all();
		$listImage = $inputAll['image_url'];
		foreach ($inputAll['image_url'] as $key => $value) {
			if ($value) {
				$path = UPLOAD_IMAGE_SLIDE;
				$destinationPath = public_path().$path.'/'.$slideId;
				$filename = $value->getClientOriginalName();
				$uploadSuccess   =  $value->move($destinationPath, $filename);
				$adminImage['slider_id'] = $slideId;
				$adminImage['image_url'] = $filename;
				$imageRelateId[] = AdminImage::firstOrCreate($adminImage)->id;
			}
		}
		return Redirect::action('AdminSlideController@index');
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
