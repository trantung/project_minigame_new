<?php

class CategoryParentController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$categoryParents = CategoryParent::orderBy('created_at',  'desc')->paginate(1);	
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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function postcreate()
	{				
		$inputCategory = Input::only('name', 'position', 'weight_number');
		$id = CommonNormal::create($inputCategory);
		$inputSeo = Input::except('_token', 'name', 'position', 'weight_number');
		CommonSeo::updateSeo($inputSeo, 'CategoryParent', $id);
		return Redirect::action('CategoryParentController@index') ;

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


}