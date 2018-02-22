<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnStatusKat33 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void (status:0 = libre, status:1 = ocupado)
     */
    public function up()
    {
        Schema::table('kat33s', function (Blueprint $table) {
            $table->integer('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kat33s', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
