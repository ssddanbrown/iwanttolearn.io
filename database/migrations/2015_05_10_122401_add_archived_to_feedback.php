<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddArchivedToFeedback extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('feedback', function(Blueprint $table)
		{
			$table->boolean('archived');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('feedback', function(Blueprint $table)
		{
			$table->dropColumn('archived');
		});
	}

}
