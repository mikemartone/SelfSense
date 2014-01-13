<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('moods', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('username');
			$table->dateTime('date');
			$table->string('mood_type');
			$table->integer('x_position');
			
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
		Schema::drop('moods');
	}

}
