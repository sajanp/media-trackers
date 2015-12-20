<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUltravioletUltravioletableType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		DB::table('ultraviolet')
			->where('ultravioletable_type', 'App\Entities\Title\EloquentTitle')
			->update(['ultravioletable_type' => 'App\Entities\Movie\EloquentMovie']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
