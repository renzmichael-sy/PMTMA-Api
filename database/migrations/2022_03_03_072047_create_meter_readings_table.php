<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeterReadingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meter_readings', function (Blueprint $table) {
            $table->id();
            $table->date('reading_date')->nullable();
            $table->bigInteger('pres_reading');
            $table->bigInteger('meter_reading_detail_id');
            $table->foreign('meter_reading_detail_id')->references('id')->on('meter_reading_details');
            $table->integer('consumption');
            $table->double('price',10,2);
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
        Schema::dropIfExists('meter_readings');
    }
}
