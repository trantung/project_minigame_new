<?php

class TypeNewTableSeeder extends Seeder {

	public function run()
	{
		TypeNew::create([
			'name'=> 'Games online',
			'weight_number' => 1,
			'slug' => 'games-online',
		]);
		TypeNew::create([
			'name'=> 'Thị Trường',
			'weight_number' => 2,
			'slug' => 'thi-truong',
		]);

		TypeNew::create([
			'name'=> 'PC/Console',
			'weight_number' => 3,
			'slug' => 'pcconsole',
		]);
		TypeNew::create([
			'name'=> 'Mobile',
			'weight_number' => 4,
			'slug' => 'mobile',
		]);
		TypeNew::create([
			'name'=> 'Esport',
			'weight_number' => 5,
			'slug' => 'esport',
		]);
	}

}