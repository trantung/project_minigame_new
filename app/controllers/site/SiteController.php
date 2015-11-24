<?php

class SiteController extends HomeController {

	public function __construct() {
		$menu = CategoryParent::where('position', MENU)->orderBy('weight_number', 'asc')->get();


		View::share('menu', $menu);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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

	public function login()
    {
    	$checkLogin = Auth::check();
        if($checkLogin) {
        	dd(12);
    		return Redirect::to('/');
        } else {
            return View::make('site.user.login');
        }
    }

    public function doLogin()
    {
        $rules = array(
            'username'   => 'required',
            'password'   => 'required',
        );
        $input = Input::except('_token');
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::route('login')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            Auth::attempt($input);
            $checkLogin = Auth::check();
            if($checkLogin) {
            	dd(12);
        		return Redirect::to('/');
            } else {
                return Redirect::route('login');
            }
        }
    }

    public function logout()
    {
        Auth::user()->logout();
        Session::flush();
        return Redirect::route('login');
    }

}
