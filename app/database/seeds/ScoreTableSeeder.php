<?php

class ScoreTableSeeder extends Seeder {

	public function run()
	{
		Score::create([
					'user_id' => '1',
					'game_id' => '8',
					'score' => '500',
			]);
		Score::create([
					'user_id' => '1',
					'game_id' => '10',
					'score' => '300',
			]);
		Score::create([
					'user_id' => '1',
					'game_id' => '11',
					'score' => '2500',
			]);
	}
}
