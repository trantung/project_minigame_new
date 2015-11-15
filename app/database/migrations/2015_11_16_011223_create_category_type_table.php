<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('type_categories', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->nullable();
            $table->string('name', 256)->nullable();
            $table->string('description', 256)->nullable();
            $table->integer('weight_number')->nullable();
            $table->integer('status')->nullable();
            $table->softDeletes();
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
        Schema::drop('type_categories');
	}

}
