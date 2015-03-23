<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchases', function(Blueprint $table)
		{
			$table->increments('id');
			$table->boolean('closed')->default(false);
			$table->integer('retailer_id')->unsigned();
			$table->integer('amount');
			$table->text('note')->nullable();
			$table->date('purchased_on');
			$table->timestamps();

			$table->foreign('retailer_id')->references('id')->on('retailers')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchases');
	}

}
