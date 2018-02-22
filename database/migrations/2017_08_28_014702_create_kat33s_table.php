<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKat33sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kat33s', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('positionLA')->default(0);
            $table->bigInteger('positionLO')->default(0);
            $table->integer('speed')->default(0);
            $table->string('simcard')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kat33s');
    }
}
