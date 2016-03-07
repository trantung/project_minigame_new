<?php

class AdChild extends Seeder {

	public function run()
	{
		Advertise::create([
					'is_mobile' => 0,
					'model_name' => 'TypeNew',
					'model_id' => 1,
					'adsense' => 'quang cao',
					'status' => 1,
					'position' => 1,
			]);
		Advertise::create([
					'is_mobile' => 0,
					'model_name' => 'TypeNew',
					'model_id' => 2,
					'adsense' => 'quang cao',
					'status' => 1,
					'position' => 2,
			]);
		Advertise::create([
					'is_mobile' => 0,
					'model_name' => 'TypeNew',
					'model_id' => 3,
					'adsense' => 'quang cao',
					'status' => 1,
					'position' => 3,
			]);
		Advertise::create([
					'is_mobile' => 0,
					'model_name' => 'TypeNew',
					'model_id' => 4,
					'adsense' => 'quang cao',
					'status' => 1,
					'position' => 4,
			]);
		Advertise::create([
					'is_mobile' => 0,
					'model_name' => 'TypeNew',
					'model_id' => 5,
					'adsense' => 'quang cao',
					'status' => 1,
					'position' => 5,
			]);

	}
}
