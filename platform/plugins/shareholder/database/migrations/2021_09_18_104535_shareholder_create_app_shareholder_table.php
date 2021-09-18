<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ShareholderCreateAppShareholderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_shareholders', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('status', 60)->default('published');
            $table->string('description', 400)->nullable();
            $table->longText('content')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('file', 255)->nullable();
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->tinyInteger('order')->unsigned()->default(0);

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
        Schema::dropIfExists('app_shareholders');
    }
}
