<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class VehicleCreateAppVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('app_vehicle_brands', function (Blueprint $table) {
            $table->unsignedBigInteger('vehicle_id')->reference('id')->on('app_vehicles')->onDelete('cascade');
            $table->unsignedBigInteger('brand_id')->reference('id')->on('app_brands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_vehicles');
        Schema::dropIfExists('app_vehicle_brands');
    }
}
