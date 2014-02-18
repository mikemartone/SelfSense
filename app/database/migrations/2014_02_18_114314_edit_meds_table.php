<?php

use Illuminate\Database\Migrations\Migration;

class EditMedsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('meds', function($table)
		{
			$table->dateTime('valid_until')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('meds', function($table)
		{
		$table->dropColumn('valid_until');
		});
	}

}