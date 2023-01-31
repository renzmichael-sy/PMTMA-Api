<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnouncementAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcement_attachments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('announcement_id');
            $table->foreign('announcement_id')->references('id')->on('announcements');
            $table->longText('link');
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
        Schema::dropIfExists('announcement_attachments');
    }
}
