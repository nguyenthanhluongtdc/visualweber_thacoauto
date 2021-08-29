<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BrandCreateAppBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_brands', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();

            $table->string('tenant_id',191)->nullable();

            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('app_brand_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->references('id')->on('app_car_categories')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->references('id')->on('app_brands')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_brands');
        Schema::dropIfExists('app_brand_categories');
    }
}
