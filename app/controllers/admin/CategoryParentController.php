<?php

class CategoryParentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categoryParents = CategoryParent::where('position', MENU)->orderBy('created_at',  'desc')->paginate(PAGINATE);
		return View::make('admin.category_parent.index')->with(compact('categoryParents'));
	}
	public function contentIndex()
	{
		$categoryParents = CategoryParent::where('position', CONTENT)->orderBy('created_at',  'desc')->paginate(PAGINATE);
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

	public function contentCreate()
	{
		return View::make('admin.category_parent.create')->with(compact());
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

			CommonSeo::createSeo('CategoryParent', $id, FOLDER_SEO_PARENT);

			AdminManager::createParentType(Input::get('type_id'),Input::get('weight_number_gametype'),$id, 'ParentType');

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

		CommonSeo::updateSeo('CategoryParent', $id, FOLDER_SEO_PARENT);

		AdminManager::updateParentType(Input::get('type_id'),Input::get('weight_number_gametype'), $id, 'ParentType');
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
