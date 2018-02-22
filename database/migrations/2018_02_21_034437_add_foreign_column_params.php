<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignColumnParams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('params', function(Blueprint $table) {
            $table->bigInteger('imei_number')->unsigned();
            $table->foreign('imei_number')->references('imei')->on('kat33s');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('params', function (Blueprint $table) {
            $table->dropForeign(['imei_number']);
            $table->dropColumn('imei_number');
        });
    }
}
