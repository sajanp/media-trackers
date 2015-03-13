<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('formats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->unique();
			$table->boolean('isOwnable')->default(false);
			$table->boolean('isRentable')->default(false);
			$table->boolean('isWatchable')->default(true);
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
		Schema::drop('formats');
	}

}
