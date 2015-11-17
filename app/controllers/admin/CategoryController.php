<?php

class CategoryController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categories = Game::where('parent_id', NULL)->orderBy('created_at',  'desc')->paginate(PAGINATE);	
		return View::make('admin.category.index')->with(compact('categories'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$listCategory_patent = CategoryParent::lists('name', 'id');
		return View::make('admin.category.create')->with(compact('listCategory_patent'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'name'   => 'required'            
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);

		if($validator->fails()) {
			return Redirect::action('CategoryController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			$inputCategory = Input::only('name');
			$input['game_id'] = CommonNormal::create($inputCategory);
			foreach (Input::get('type_id') as $value) {
				$input['category_parent_id'] = $value;
				CommonNormal::create($input, 'GameRelation');
			}
			$inputSeo = Input::except('_token', 'name', 'position', 'weight_number');
			CommonSeo::updateSeo($inputSeo, 'Game', $input['game_id']);
			$input['image_url_fb']= CommonSeo::uploadImage($inputSeo,$input['game_id'], UPLOADIMG, 'image_url_fb');
			CommonSeo::updateSeo(['image_url_fb' => $input['image_url_fb']], 'Game', $input['game_id']);
			return Redirect::action('CategoryController@index') ;
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
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$parent = Game::find($id)->categoryparents;
		$category = Game::find($id);
		dd($category);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'Game')->first();
		return View::make('admin.category.edit')->with(compact('parent', 'inputSeo'));
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
			'name'   => 'required'            
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);

		if($validator->fails()) {
			return Redirect::action('CategoryController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
			$inputCategory = Input::only('name');
			$input['game_id'] = CommonNormal::Update($id, $inputCategory);
			$input['category_parent_id'] = Input::get('category_parent_id');

			CommonNormal::update($input, 'GameRelation');
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
		CommonSeo::deleteSeo($id,'Game');
        return Redirect::action('CategoryController@index');
	
	}


}
