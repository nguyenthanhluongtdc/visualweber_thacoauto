<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppCarShowroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_car_showrooms', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->unsignedBigInteger('showroom_id')->references('id')->on('app_showrooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_car_showrooms');
    }
}
