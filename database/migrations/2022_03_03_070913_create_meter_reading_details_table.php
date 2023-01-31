<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterReadingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_reading_details', function (Blueprint $table) {
            $table->id();
            $table->date('billing_period_start');
            $table->date('billing_period_end');
            $table->date('due_date');
            $table->date('bill_date');
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
        Schema::dropIfExists('meter_reading_details');
    }
}
