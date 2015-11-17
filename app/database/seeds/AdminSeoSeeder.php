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
			'description_site' => 'This is des parent 1',
		]);

	}
}