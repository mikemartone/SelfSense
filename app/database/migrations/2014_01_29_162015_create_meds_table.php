<?php

use Illuminate\Database\Migrations\Migration;

class CreateMedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meds', function($table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('medication')->nullable();
			$table->string('dosage')->nullable();
			$table->string('prescribedby')->nullable();
			$table->integer('am_regimen')->nullable();
			$table->integer('pm_regimen')->nullable();
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
		Schema::drop('meds');
	}

}