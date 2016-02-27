<?php

class LogoTableSeeder extends Seeder {

	public function run()
	{
		AdminLogo::create([
				'text_link' => 'http://game.kienthuc.net.vn/',
			]);
	}

}