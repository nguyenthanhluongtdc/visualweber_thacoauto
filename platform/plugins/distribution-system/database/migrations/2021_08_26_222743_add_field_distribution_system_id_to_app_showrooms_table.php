<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldDistributionSystemIdToAppShowroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_showrooms', function (Blueprint $table) {
            $table->unsignedBigInteger('distribution_system_id')->nullable();
            $table->dropColumn('brand_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_showrooms', function (Blueprint $table) {
            $table->dropColumn('distribution_system_id');
        });
    }
}
