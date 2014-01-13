<?php

use Illuminate\Database\Migrations\Migration;

class EditTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('moods', function($table)
		{
			$table->dropColumn('username');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::table('moods', function($table)
		{
			$table->dropColumn('user_id');
			$table->string('username');
		});


	}

}