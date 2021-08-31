<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class BankloansCreateBankloansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bankloans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->text('description');
            $table->integer('months');
            $table->float('interest_rate');
            $table->float('floating_rate')->nullable();
            $table->float('percent_loans');
            $table->unsignedInteger('bank_id')->nullable();
            $table->string('status', 60)->default('published');
            $table->timestamps();
            $table->foreign('bank_id')->references('id')->on('banks')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bankloans');
    }
}
