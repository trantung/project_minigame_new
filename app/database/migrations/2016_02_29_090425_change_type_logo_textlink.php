<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeLogoTextlink extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('logos', function(Blueprint $table) {
			$table->dropColumn('text_link');
		});
		Schema::table('logos', function(Blueprint $table) {
			$table->text('text_link')->after('id')->nullable();
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
