<?php

use Illuminate\Database\Migrations\Migration;

class CreateRelationshipsEntriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('relationships_entries', function($table)
		{
			$table->increments('id');
			$table->integer('rel_id')->unsigned()->nullable();
			$table->foreign('rel_id')->references('id')->on('relationships')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->nullable();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->integer('frequency')->nullable();
			$table->integer('closeness')->nullable();
			$table->timestamps();
		});	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('relationships_entries');
	}

}