<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertMoreField2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('advertisements', function(Blueprint $table) {
            $table->integer('model_id')->after('id')->nullable();
            $table->string('model_name', 256)->after('id')->nullable();
            $table->integer('weight_number')->after('id')->default(0)->nullable();
            $table->integer('is_mobile')->after('id')->default(0)->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
