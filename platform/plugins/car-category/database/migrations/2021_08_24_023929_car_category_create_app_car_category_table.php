<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CarCategoryCreateAppCarCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_car_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description', 255)->nullable()->comment();
            $table->string('status', 60)->default('published');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->references('id')->on('app_car_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_car_categories');
    }
}
