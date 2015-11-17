<?php

class CategoryParentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categoryParents = CategoryParent::orderBy('created_at',  'desc')->paginate(PAGINATE);
		return View::make('admin.category_parent.index')->with(compact('categoryParents'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.category_parent.create');
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
			$inputCategory = Input::only('name', 'position', 'weight_number');
			$id = CommonNormal::create($inputCategory);
			$inputSeo = Input::except('_token', 'name', 'position', 'weight_number');
			CommonSeo::updateSeo($inputSeo, 'CategoryParent', $id);
			$input['image_url_fb']= CommonSeo::uploadImage($inputSeo,$id, UPLOADIMG, 'image_url_fb');
			CommonSeo::updateSeo(['image_url_fb' => $input['image_url_fb']], 'CategoryParent', $id);
			AdminManager::createParentType(Input::get('type_id'),Input::get('weight_number_gametype'),$id);
			return Redirect::action('CategoryParentController@index') ;
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

		$inputCategory = CategoryParent::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'CategoryParent')->first();
		return View::make('admin.category_parent.edit')->with(compact('inputCategory', 'inputSeo'));
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
        }
		$inputCategory = Input::only('name', 'position', 'weight_number');
		CommonNormal::update($id,$inputCategory);
		$inputSeo = Input::except('_token', 'name', 'position', 'weight_number');
		$inputSeo['image_url_fb']= CommonSeo::uploadImage($inputSeo, $id, UPLOADIMG, 'image_url_fb');
		CommonSeo::updateSeo($inputSeo, 'CategoryParent', $id);
		AdminManager::updateParentType(Input::get('type_id'),Input::get('weight_number_gametype'),$id);
		return Redirect::action('CategoryParentController@index') ;
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
        return Redirect::action('CategoryParentController@index');
	}
}
