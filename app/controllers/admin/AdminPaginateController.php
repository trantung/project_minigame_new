<?php

class AdminPaginateController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$datas = AdminPagination::where('model_name', 'AdminNew')
			->whereNull('model_id')->get();
		return View::make('admin.paginate.index')->with(compact('datas'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
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
		$data = AdminPagination::find($id);
		return View::make('admin.paginate.edit')->with(compact('data'));
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
		$rules = array(
            'paginate_number'   => 'required|integer|min:0',
		);
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AdminPaginateController@edit', $id)
	            ->withErrors($validator);
        } else {
        	AdminPagination::find($id)->update($input);
        	return Redirect::action('AdminPaginateController@index');
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
		//
	}


}
