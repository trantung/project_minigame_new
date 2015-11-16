<?php

class GameTableSeeder extends Seeder {

	public function run()
	{
		Game::create([
					'name' => 'Game Flash',
			]);
		Game::create([
					'name' => 'Game HTML5',
			]);
		Game::create([
					'name' => 'Game offline',
			]);
	}

}