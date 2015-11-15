<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		User::create([
					'email'=>'trantunghn196@gmail.com',
					'password'=>Hash::make('tunglaso1'),
			]);
	}

}