<?php
class CommonSite
{
	public static function isLogin()
    {
        if (Auth::user()->check()) {
            return true;
        }else{
            return false;
        }
    }

    public static function inputRegister()
    {
    	$input = Input::except('_token');
    	$input['status'] = ACTIVE;
    	$input['ip'] = getIpAddress();
    	$input['device'] = getDevice();
    	return $input;
    }

}