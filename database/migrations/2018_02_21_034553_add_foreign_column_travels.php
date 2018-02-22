<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignColumnTravels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('route_id')->references('id')->on('routes');
            $table->foreign('feedback_id')->references('id')->on('feedbacks');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('kat33_id')->references('id')->on('kat33s');
            $table->foreign('business_id')->references('id')->on('businesses');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('travels', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['route_id']);
            $table->dropColumn('route_id');
            $table->dropForeign(['feedback_id']);
            $table->dropColumn('feedback_id');
            $table->dropForeign(['vehicle_id']);
            $table->dropColumn('vehicle_id');
            $table->dropForeign(['kat33_id']);
            $table->dropColumn('kat33_id');
            $table->dropForeign(['business_id']);
            $table->dropColumn('business_id');
        });
    }
}
