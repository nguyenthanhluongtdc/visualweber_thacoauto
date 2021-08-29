<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppPromotionCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app__promotion_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_id')->reference('id')->on('app_cars')->onDelete('cascade');
            $table->unsignedBigInteger('promotion_id')->reference('id')->on('app_promotions')->onDelete('cascade');
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
        Schema::dropIfExists('app__promotion_cars');
    }
}
