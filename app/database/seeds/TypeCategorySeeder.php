<?php

class TypeCategorySeeder extends Seeder {

	public function run()
	{
		TypeCategoryParent::create([
			'position'=> 1,
			'name'=> 'Game Android',
			'description' => 'This is game android of menu',
			'weight_number' => 1,
			'status' => 1,
		]);
		TypeCategoryParent::create([
			'position'=> 1,
			'name'=> 'Game Online',
			'description' => 'This is game online of menu',
			'weight_number' => 2,
			'status' => 1,
		]);
		TypeCategoryParent::create([
			'name'=> 'Action',
			'description' => 'This is game action of game online',
			'weight_number' => 1,
			'status' => 2,
		]);
		TypeCategoryParent::create([
			'name'=> 'Boy',
			'description' => 'This is game boy of game online',
			'weight_number' => 2,
			'status' => 2,
		]);
		TypeCategoryParent::create([
			'name'=> 'Girl',
			'description' => 'This is game girl of game online',
			'weight_number' => 3,
			'status' => 2,
		]);
	}

}