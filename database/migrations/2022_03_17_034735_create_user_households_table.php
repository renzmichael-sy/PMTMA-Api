<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHouseholdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_households', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('primary_tenant_id');
            $table->foreign('primary_tenant_id')->references('id')->on('users');
            $table->bigInteger('household_id');
            $table->foreign('household_id')->references('id')->on('users');
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
        Schema::dropIfExists('user_households');
    }
}
