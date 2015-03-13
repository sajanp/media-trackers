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
			$table->integer('title_id')->unsigned();
			$table->integer('purchase_id')->unsigned()->nullable();
			$table->boolean('isRedeemed')->default(true);
			$table->date('redeemed_on');
			$table->timestamps();

			$table->foreign('title_id')->references('id')->on('titles')->onUpdate('cascade');
			$table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade');
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
