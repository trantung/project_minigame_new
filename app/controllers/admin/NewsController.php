<?php 

class NewsController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputNew = AdminNew::orderBy('id', 'asc')->paginate(PAGINATE);		

		return View::make('admin.news.index')->with(compact('inputNew'));
	}
	public function search()
	{
		$input = Input::all();
		
		return View::make('admin.news.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.news.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title'   => 'required' 
			
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('NewsController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('name'));
        } else {
        	//create news
        	$inputNews = Input::only('type_new_id', 'title', 'description','start_date');
			$id = CommonNormal::create($inputNews);

			//upload image new
			$input['image_url'] = CommonSeo::uploadImage($inputNews,$id, UPLOADIMG, 'image_url','news');
			CommonNormal::update($id, ['image_url' => $input['image_url']] );

			//chưa lam create history
			
			// insert ceo
			$inputSeo = Input::except('type_new_id', 'title', 'description','start_date','image_url');
			CommonSeo::updateSeo($inputSeo, 'AdminNew', $id);
			$input['image_url_fb'] = CommonSeo::uploadImage($inputSeo,$id, UPLOADIMG, 'image_url_fb','seo');
			CommonSeo::updateSeo(['image_url_fb' => $input['image_url_fb']], 'AdminNew', $id);

			return Redirect::action('NewsController@index');
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
		$inputNew = AdminNew::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'AdminNew')->first();
		return View::make('admin.news.edit')->with(compact('inputNew','inputSeo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'title'   => 'required' 
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('NewsController@edit',$id)
	            ->withErrors($validator)
	            ->withInput(Input::except('name'));
        } else {
        	//update News
        	$inputNews = Input::only('type_new_id', 'title', 'description','start_date');
			CommonNormal::update($id, $inputNews);
			
			//update upload image 
			$imageNews = AdminNew::find($id);
			$input['image_url'] = CommonSeo::uploadImage($inputNews,$id, UPLOADIMG, 'image_url','news',$imageNews->image_url);
			CommonNormal::update($id, ['image_url' => $input['image_url']] );

			//chưa lam create history

			//upadte ceo
			$inputSeo = Input::except('_token', 'title', 'type_new_id', 'description','start_date');
			$imageSeo = CommonSeo::getImageSeoUrl('AdminNew', $id);
			$inputSeo['image_url_fb']= CommonSeo::uploadImage($inputSeo, $id, UPLOADIMG, 'image_url_fb','seo', $imageSeo);
			CommonSeo::updateSeo($inputSeo, 'AdminNew', $id);
			return Redirect::action('NewsController@index') ;
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
		return Redirect::action('NewsController@index') ;
	}
}
