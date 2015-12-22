<?php

class TestTableSeeder extends Seeder {

	public function run()
	{
		TestGame::create([
					'weight' => '100',
					'height'=>'100'
			]);
	}

}