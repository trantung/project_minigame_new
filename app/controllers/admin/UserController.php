<?php

class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputUser = User::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.user.index')->with(compact('inputUser'));
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
		$statusUser = User::find($id);
	
		if($statusUser->status == ACTIVE)
		{
			$input['status'] = INACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}else{
			$input['status'] = ACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}

		return Redirect::action('UserController@index') ;
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
		CommonNormal::delete($id);
		return Redirect::action('UserController@index');
	}

	//search data
	public function search()
	{
		$input = Input::all();
		$inputComment = User::searchComment($input);
		
		return View::make('admin.comment.index')->with(compact('inputComment'));
	}

}
