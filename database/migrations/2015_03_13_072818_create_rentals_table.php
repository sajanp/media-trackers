<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rentals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('title_id')->unsigned();
			$table->integer('retailer_id')->unsigned();
			$table->integer('format_id')->unsigned();
			$table->integer('price');
			$table->boolean('stillRented')->default(true);
			$table->date('rented_on');
			$table->date('expires_on');
			$table->timestamps();

			$table->foreign('title_id')->references('id')->on('titles')->onUpdate('cascade');
			$table->foreign('retailer_id')->references('id')->on('retailers')->onUpdate('cascade');
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
		Schema::drop('rentals');
	}

}
