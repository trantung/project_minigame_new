<?php

class GameCategoryParent extends Seeder {

	public function run()
	{
		GameRelation::create([
					'category_parent_id' => 2,
					'game_id'=> 1,
			]);
		GameRelation::create([
					'category_parent_id' => 2,
					'game_id'=> 2,
			]);
	}

}