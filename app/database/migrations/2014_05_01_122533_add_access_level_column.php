<?php

use Illuminate\Database\Migrations\Migration;

class AddAccessLevelColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('users', function($table)
		{
			$table->integer('access_level');
			$table->string('email')->nullable();

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
		Schema::table('users', function($table)
		{
			$table->dropColumn('access_level');
			$table->dropColumn('email');
		});
	}

}

