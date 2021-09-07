<?php

use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Types\FloatType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateColumnPriceToAppCars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Type::hasType('double')) {
            Type::addType('double', FloatType::class);
        }
        Schema::table('app_cars', function (Blueprint $table) {
            $table->double('price')->nullable()->comment('Giá')->change();
            $table->double('fee')->nullable()->change();
            $table->double('fee_license_plate')->nullable()->change();
            $table->double('promotion')->nullable()->change();
        });

        Schema::table('app_accessories', function (Blueprint $table) {
            $table->double('price')->nullable()->comment('Giá')->change();
        });
        Schema::table('app_equipments', function (Blueprint $table) {
            $table->double('price')->nullable()->comment('Giá')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app__cars', function (Blueprint $table) {
            $table->decimal('price',18,4)->nullable();
            $table->float('fee')->nullable();
            $table->float('fee_license_plate')->nullable();
            $table->float('promotion')->nullable();
        });
        Schema::table('app_accessories', function (Blueprint $table) {
            $table->decimal('price',18,4)->nullable();
        });
        Schema::table('app_equipments', function (Blueprint $table) {
            $table->decimal('price',18,4)->nullable();
        });
    }
}
