<?php

use Illuminate\Database\Migrations\Migration;

class CreateSleepTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sleep_entries', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('start')->nullable();
			$table->integer('interruption0')->nullable();
			$table->integer('interruption1')->nullable();
			$table->integer('interruption2')->nullable();
			$table->integer('note0')->nullable();
			$table->integer('note1')->nullable();
			$table->integer('note2')->nullable();
			$table->integer('stop')->nullable();
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
		Schema::drop('sleep_entries');
	}

}