<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewSlides extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('new_slides', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('new_id')->nullable();
			$table->string('image_url', 256)->nullable();
			$table->string('sapo', 256)->nullable();
			$table->integer('weight_number')->nullable();
			$table->integer('status')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('new_slides');
	}

}
