<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlugToFormats extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('formats', function(Blueprint $table)
		{
            $table->string('slug', 100);
		});

        foreach(\Learn\Models\Format::all() as $format) {
            $format->slug = preg_replace('/^-+|-+$/', '', strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $format->name)));
            $format->save();
        }
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('formats', function(Blueprint $table)
		{
			$table->dropColumn('slug');
		});
	}

}
