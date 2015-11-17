<?php

class ManagerController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Admin::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.manager.index')->with(compact('data'));
	}

	public function search()
	{
		$input = Input::all();
		if (!$input['keyword'] && !$input['role_id']) {
			return Redirect::action('ManagerController@index');
		}
		$data = AdminManager::searchUserOperation($input);
		return View::make('admin.manager.index')->with(compact('data'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.manager.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username'   => 'required',
            'password'   => 'required',
            'email'      => 'required|email',
            'role_id'    => 'required',
		);
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagerController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('name'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	$id = CommonNormal::create($input);
        	if($id) {
        		return Redirect::action('ManagerController@index');
        	} else {
        		dd('Error');
        	}
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
		$data = Admin::find($id);
        return View::make('admin.manager.edit', array('data'=>$data));
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
            'username'   => 'required',
            'password'   => 'required',
            'email'      => 'required|email',
            'role_id'    => 'required',
        );
        if (!Admin::isAdmin()) {
        	unset($rules['role_id']);
        }
        $input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('ManagerController@edit', $id)
	            ->withErrors($validator)
	            ->withInput(Input::except('password'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	CommonNormal::update($id, $input);
    		return Redirect::action('ManagerController@index');
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
        return Redirect::action('ManagerController@index');
	}


}
