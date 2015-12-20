<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePurchaseablesTypeColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('purchaseables')
			->where('purchaseable_type', 'App\Entities\Title\EloquentTitle')
			->update(['purchaseable_type' => 'App\Entities\Movie\EloquentMovie']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchaseables', function (Blueprint $table) {
            //
        });
    }
}
