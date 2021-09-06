<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAppPromotionDeposit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_deposit_promotions', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('deposit_id');
            $table->timestamps();
        });

        Schema::table('app_deposits', function (Blueprint $table) {
            $table->integer('city_id')->nullable();
            $table->string('type_paynent')->nullable();
            $table->unsignedDouble('price_discount_total')->nullable();
            $table->unsignedDouble('total_price')->nullable();
            $table->integer('bank_id')->nullable();
            $table->unsignedDouble('loan_month')->nullable();
            $table->unsignedDouble('percent_loan')->nullable();
            $table->unsignedDouble('interest_rate')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_deposit_promotions');
        Schema::table('app_deposits', function (Blueprint $table) {
            $table->dropColumn('city_id');
            $table->dropColumn('type_paynent');
            $table->dropColumn('price_discount_total');
            $table->dropColumn('total_price');
            $table->dropColumn('bank_id');
            $table->dropColumn('loan_month');
            $table->dropColumn('percent_loan');
            $table->dropColumn('interest_rate');
        });
    }
}
