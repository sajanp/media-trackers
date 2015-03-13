<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseTitleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchase_title', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('title_id')->unsigned();
			$table->integer('purchase_id')->unsigned();
			$table->integer('format_id')->unsigned();
			$table->string('edition')->nullable();
			$table->timestamps();

			$table->foreign('title_id')->references('id')->on('titles')->onUpdate('cascade');
			$table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade');
			$table->foreign('format_id')->references('id')->on('formats')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchase_title');
	}

}
