<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnDiscountToAppPromotions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_promotions', function (Blueprint $table) {
            $table->unsignedTinyInteger('discount_percent')->default(0);
            $table->unsignedInteger('max_discount')->default(0);
            $table->unsignedInteger('direct_discount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_promotions', function (Blueprint $table) {
            $table->dropColumn('discount_percent');
            $table->dropColumn('max_discount');
            $table->dropColumn('direct_discount');
        });
    }
}
