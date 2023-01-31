<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserParkingContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_parking_contracts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('User');
            $table->bigInteger('parking_slot_id');
            $table->foreign('parking_slot_id')->references('id')->on('ParkingSlot');
            $table->double('contract_price',10,2);
            $table->date('contract_start_date');
            $table->date('contract_expiry_date');
            $table->tinyInteger('payment_date');
            $table->tinyInteger('is_active')->default(0)->unsigned();
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
        Schema::dropIfExists('user_parking_contracts');
    }
}
