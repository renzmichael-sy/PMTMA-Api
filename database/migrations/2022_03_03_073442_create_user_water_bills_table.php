<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserWaterBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_water_bills', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('water_bill_details_id');
            $table->foreign('water_bill_details_id')->references('id')->on('water_bill_details');
            $table->bigInteger('user_unit_contracts_id');
            $table->foreign('user_unit_contracts_id')->references('id')->on('user_unit_contracts');
            $table->bigInteger('pres_reading');
            $table->integer('consumption');
            $table->double('price',10,2);
            $table->double('ppc',10,2);
            $table->tinyInteger('is_active')->default(1)->unsigned();
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
        Schema::dropIfExists('user_water_bills');
    }
}
