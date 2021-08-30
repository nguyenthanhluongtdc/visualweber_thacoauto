<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TestDriveCreateAppTestDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_test_drives', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('type_register', 255);
            $table->string('vocative', 255);
            $table->string('phone', 255);
            $table->string('email', 255);
            $table->unsignedBigInteger('province_id')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('want_to_buy_id')->nullable();
            $table->unsignedBigInteger('test_drive_id')->nullable();
            $table->string('time', 255);
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('app_test_drives');
    }
}
