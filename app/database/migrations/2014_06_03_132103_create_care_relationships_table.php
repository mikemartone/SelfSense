<?php

use Illuminate\Database\Migrations\Migration;

class CreateCareRelationshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('care_relationships', function($table)
		{
			$table->increments('id');
			$table->integer('caretaker_id')->unsigned()->nullable();
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('caretaker_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('relationship')->nullable();
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
		Schema::drop('care_relationships');
	}

}