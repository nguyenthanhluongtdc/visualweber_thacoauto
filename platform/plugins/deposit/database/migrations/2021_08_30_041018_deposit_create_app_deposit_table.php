<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DepositCreateAppDepositTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_deposits', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('phone', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('note')->nullable();
            $table->decimal('price',18,4)->nullable();
            $table->decimal('fee',18,4)->nullable();
            $table->decimal('fee_license_plate',18,4)->nullable();
            $table->decimal('promotion',18,4)->nullable();

            $table->unsignedBigInteger('showroom_id')->nullable();
            $table->unsignedBigInteger('car_id')->references('id')->on('app_cars')->onDelete('cascade');
            $table->unsignedBigInteger('color_id')->references('id')->on('app_colors')->onDelete('cascade');

            $table->string('status', 60)->default('published');
            $table->timestamps();
        });

        Schema::create('app_deposit_accessories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('price',18,4)->nullable();
            $table->unsignedBigInteger('deposit_id')->references('id')->on('app_deposits')->onDelete('cascade');
        });

        Schema::create('app_deposit_equipments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->decimal('price',18,4)->nullable();
            $table->unsignedBigInteger('deposit_id')->references('id')->on('app_deposits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_deposits');
        Schema::dropIfExists('app_deposit_accessories');
        Schema::dropIfExists('app_deposit_equipments');
    }
}
