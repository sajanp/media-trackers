<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPolymorphicItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropForeign('rentals_title_id_foreign');
            $table->dropColumn('title_id');

            $table->string('rentable_type');
            $table->integer('rentable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->dropColumn('rentable_type');
            $table->dropColumn('rentable_id');

            $table->integer('title_id')->after('id')->unsigned();
            $table->foreign('title_id')->references('id')->on('movies')->onUpdate('cascade');
        });
    }
}
