<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisplayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('displays', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('model_id')->nullable();
			$table->string('model_name', 256)->nullable();
			$table->integer('weight_number')->nullable();
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
		Schema::drop('displays');
	}

}
