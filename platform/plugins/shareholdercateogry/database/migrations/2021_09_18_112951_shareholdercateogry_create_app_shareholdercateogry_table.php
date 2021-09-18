<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ShareholdercateogryCreateAppShareholdercateogryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_shareholdercateogries', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->string('description', 400)->nullable();
            $table->string('status', 60)->default('published');
            $table->tinyInteger('order')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('app__shareholder_category', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned()->references('id')->on('app_shareholdercategories')->onDelete('cascade');
            $table->integer('shareholder_id')->unsigned()->references('id')->on('app_shareholders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_shareholdercateogries');
        Schema::dropIfExists('app__shareholder_category');
    }
}
