<?php

class PasswordController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('password.index');
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
		$data = Input::all();
		$segment = Request::segment(1);
		if($segment == 'admin') {
			$user = Admin::where('email', $data['email'])->first();
		} else {
			$user = User::where('email', $data['email'])->first();
		}
		if(is_null($user)){
			return Redirect::action('PasswordController@index')->with('error', 'Email không đúng!');
		}
		$url = route('password.changepass').'?param=';
		$param = json_encode($data);
		$encoded = ( urlencode(base64_encode($param)));
		$url .= $encoded;
		$mailData = ['url'=>$url];
		dd($url);
		Mail::send('emails.changepass', $mailData, function($message) use ($user,$data) {
			$message->to($data['email'], 'Hello'.$user->name)->subject('Authorize password');
		});
		if(Mail::failures()){
			return Redirect::action('PasswordController@index')->with('error', 'Email không đúng!');
		}
		return Redirect::action('PasswordController@index')->with('message', 'Thông tin đã được gửi vào email của bạn!');
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

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

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

	public function changePass()
	{
		$encoded = Input::get('param');
		$decoded = base64_decode(urldecode( $encoded ));
		$data = json_decode($decoded);
		$segment = Request::segment(1);
		if($segment == 'admin') {
			$user = Admin::where('email', $data->email)->first();
			if(is_null($user)){
				return Redirect::action('AdminController@login')->with('error', 'Thông tin sai!');
			}else{
				if($data->new_password != $data->re_password){
					return Redirect::action('AdminController@login')->with('error', 'Password không giống nhau!');
				}
				else{
					$user->password = Hash::make($data->new_password);
					$user->save();
				}
			}
			return Redirect::action('AdminController@login')->with('message', 'Đổi mật khẩu thành công, mời login!');
		} else {
			$user = User::where('email', $data->email)->first();
			// for user front-end
		}
	}

}
