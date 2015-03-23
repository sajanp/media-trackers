<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseablesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('purchaseables', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('purchase_id')->unsigned();
			$table->integer('purchaseable_id');
			$table->string('purchaseable_type');
			$table->integer('format_id')->unsigned();
			$table->string('edition');

			$table->foreign('purchase_id')->references('id')->on('purchases')->onUpdate('cascade')->onDelete('cascade');
			$table->foreign('format_id')->references('id')->on('formats')->onUpdate('cascade')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('purchaseables');
	}

}
