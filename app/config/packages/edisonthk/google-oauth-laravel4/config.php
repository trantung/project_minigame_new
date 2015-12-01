<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Google' => array(
            'client_id'     => '414594207498-vnpqr3cb4e8bov5ejtlgill52v84elac.apps.googleusercontent.com',
            'client_secret' => 'EHPS9wXHEjKgdLsUB21Ov_R_',
            'redirect_url'	=> 'http://minigame.de/dang-nhap',
            'scope'         => array('userinfo_email', 'userinfo_profile'),
        ),

	)

);