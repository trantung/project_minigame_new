<?php

class AccountController extends SiteController {

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
		return View::make('site.user.register');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'user_name'  => 'required|unique:users',
            'password'   => 'required|min:6',
            'email'      => 'required|email|unique:users',
            'phone'      => 'required',
            'captcha'    => 'required'
		);
		$checkCaptcha = SimpleCaptcha::check(Input::get('captcha'));
		if($checkCaptcha == false) {
		    return Redirect::action('AccountController@create')
	            ->with('error', 'Bạn nhập sai mã xác nhận')
	            ->withInput(Input::except('password', 'captcha'));
		}
		$input = CommonSite::inputRegister();
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AccountController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('password', 'captcha'));
        } else {
        	$input['password'] = Hash::make($input['password']);
        	$id = CommonNormal::create($input, 'User');
        	if($id) {
        		return Redirect::action('SiteController@login')->with('message', 'Tài khoản của bạn đã được tạo thành công. Hãy đăng nhập ngay!');
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

	public function account()
	{
		if(!CommonSite::isLogin()) {
			return Redirect::action('AccountController@create');
		}
		$id = Auth::user()->get()->id;
		$data = User::find($id);
        return View::make('site.user.account', array('data'=>$data));
	}

	public function doAccount()
	{
		if(!CommonSite::isLogin()) {
			return Redirect::action('AccountController@create');
		}
		$id = Auth::user()->get()->id;
		$rules = array(
			'password'   	=> 'required|min:6',
			'password_new'  => 'required|min:6',
			'password_new2' => 'required|min:6|same:password_new',
            // 'email'      	=> 'required|email|unique:users'
        );
        if(Auth::user()->get()->email != Input::get('email')) {
        	$rules['email'] = 'required|email|unique:users';
        }
        $input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('AccountController@account')
	            ->withErrors($validator)
	            ->withInput(Input::except('password', 'password_new', 'password_new2'));
        } else {
        	$input['password'] = Hash::make($input['password_new']);
        	CommonNormal::update($id, $input, 'User');
    		return Redirect::action('AccountController@account')->with('message', 'Cập nhật thành công');
        }
	}

}