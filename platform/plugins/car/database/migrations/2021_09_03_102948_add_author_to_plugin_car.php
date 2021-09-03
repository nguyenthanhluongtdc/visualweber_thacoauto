<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Platform\ACL\Models\User;

class AddAuthorToPluginCar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_cars', function (Blueprint $table) {
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
        });
        Schema::table('app_accessories', function (Blueprint $table) {
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
        });
        Schema::table('app_colors', function (Blueprint $table) {
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
        });
        Schema::table('app_equipments', function (Blueprint $table) {
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
