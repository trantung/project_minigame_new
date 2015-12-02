<?php
class SocialLogin
{
	public static function checkLoginGoogle()
	{
		$googleService = GoogleOAuth::consumer();

        if(Input::has("code")){
            $code = Input::get("code");
            $googleService->requestAccessToken($code);
            return Redirect::to("/dang-nhap");
        }

        if(!GoogleOAuth::hasAuthorized()){
            die("Not authorized yet");
        }

        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

        if($user = User::where('google_id', $result['id'])->first()) {
        	return $user->id;
        }
        else {
        	$userId = User::create(['google_id' => $result['id'], 'google_name' => $result['name']])->id;
        	return $userId;
        }

        // $message = 'Your unique Google user id is: ' . $result['id'] . ' and your name is ' . $result['name'];

        // die($message. "<br/>");
	}

}