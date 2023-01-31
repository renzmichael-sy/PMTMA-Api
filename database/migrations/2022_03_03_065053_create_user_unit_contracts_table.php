<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUnitContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_unit_contracts', function (Blueprint $table) {
          $table->id();
          $table->bigInteger('user_id');
          $table->foreign('user_id')->references('id')->on('User');
          $table->bigInteger('unit_id');
          $table->foreign('unit_id')->references('id')->on('Unit');
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
        Schema::dropIfExists('user_unit_contracts');
    }
}
