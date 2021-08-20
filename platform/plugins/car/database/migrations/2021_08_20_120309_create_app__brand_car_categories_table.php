<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppBrandCarCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app__brand_car_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('car_category_id')->unsigned()->references('id')->on('app_car_categories')->onDelete('cascade');
            $table->integer('brand_id')->unsigned()->references('id')->on('app_brand')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app__brand_car_categories');
    }
}
