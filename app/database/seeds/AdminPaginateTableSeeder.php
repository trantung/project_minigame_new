<?php

class AdminPaginateTableSeeder extends Seeder {

	public function run()
	{
		AdminPagination::create([
					'model_name' => 'AdminNew',
					'status' => NEW_HOT,
					'paginate_number' => 5,
			]);
		AdminPagination::create([
					'model_name' => 'AdminNew',
					'status' => NEW_RELATE,
					'paginate_number' => 2,
			]);
	}
}
