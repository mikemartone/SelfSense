<?php

use Illuminate\Database\Migrations\Migration;

class CreateMedEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('med_entries', function($table)
		{
			$table->increments('id');
			$table->integer('med_id')->unsigned()->nullable();
			$table->foreign('med_id')->references('id')->on('meds')->onDelete('cascade');
			$table->integer('am_times_taken')->nullable();
			$table->integer('pm_times_taken')->nullable();
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
		Schema::drop('med_entries');
	}

}