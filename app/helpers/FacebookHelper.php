<?php

class FacebookHelper
{
	private $helper;
	public function __construct(){
		FacebookSession::setDefaultApplication(Config::get('facebook.app_id'), Config::get('facebook.app_secret'));

		$this->helper = new FacebookRedirectLoginHelper('your redirect URL here');
		$loginUrl = $helper->getLoginUrl();
	}

}