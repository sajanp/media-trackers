<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUltravioletTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ultraviolet', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ultravioletable_id');
			$table->string('ultravioletable_type');
			$table->integer('purchase_id')->unsigned()->nullable();
			$table->timestamps();

			$table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ultraviolet');
	}

}
