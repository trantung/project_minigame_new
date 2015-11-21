<?php

class AdminSeoSeeder extends Seeder {

	public function run()
	{
		AdminSeo::create([
			'model_name'=> 'CategoryParent',
			'model_id' => 1,
			'description_site' => 'This is des parent 1',
		]);
		AdminSeo::create([
			'model_name'=> 'CategoryParent',
			'model_id' => 2,
			'description_site' => 'This is des parent 2',
		]);
		AdminSeo::create([
			'model_name'=> 'CategoryParent',
			'model_id' => 3,
			'description_site' => 'This is des parent 3',
		]);
		AdminSeo::create([
			'model_name'=> 'CategoryParent',
			'model_id' => 4,
			'description_site' => 'This is des parent 4',
		]);
		AdminSeo::create([
			'model_name'=> 'CategoryParent',
			'model_id' => 5,
			'description_site' => 'This is des parent 5',
		]);
	}
}