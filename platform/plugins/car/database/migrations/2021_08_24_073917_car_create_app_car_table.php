<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CarCreateAppCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_cars', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->float('horse_power')->nullable()->comment('Mã lực');
            $table->string('fuel_type',255)->nullable()->comment('Loại nhiên liệu');
            $table->string('gear',255)->nullable()->comment('Hộp số');
            $table->string('brochure',255)->nullable()->comment('Link brochure');
            $table->float('fee')->nullable()->comment('Phí trước bạ');
            $table->float('fee_license_plate')->nullable()->comment('Phí ra biển số');
            $table->float('promotion')->nullable()->comment('Số tiền khuyến mãi');

            $table->unsignedBigInteger('parent_id')->nullable()->comment('Parent');
            $table->unsignedBigInteger('vehicle_id')->nullable()->comment('Dòng xe');

            $table->string('status', 60)->default('published');

            $table->foreign('parent_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('app_vehicles')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('app_colors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('code',255)->nullable();

            $table->unsignedBigInteger('car_id')->nullable()->comment('Car');

            $table->string('status', 60)->default('published');

            $table->foreign('car_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('app_accessories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('image',255)->nullable();
            $table->decimal('price',18,4)->nullable();

            $table->unsignedBigInteger('car_id')->nullable()->comment('Car');

            $table->string('status', 60)->default('published');

            $table->foreign('car_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('app_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('slug',255)->nullable();
            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('app_version_equipments', function (Blueprint $table) {
            $table->unsignedBigInteger('car_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->unsignedBigInteger('equipment_id')->references('id')->on('app_equipments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_cars');
        Schema::dropIfExists('app_colors');
        Schema::dropIfExists('app_accessories');
        Schema::dropIfExists('app_equipments');
        Schema::dropIfExists('app_version_equipments');
    }
}
