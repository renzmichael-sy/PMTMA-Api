<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name',10);
            $table->smallInteger('capacity');
            $table->bigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties');
            $table->bigInteger('type_id');
            $table->foreign('type_id')->references('id')->on('unit_types');
            $table->decimal('price',10,2);
            $table->tinyinteger('is_active')->default(1)->unsigned();
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
        Schema::dropIfExists('units');
    }
}
