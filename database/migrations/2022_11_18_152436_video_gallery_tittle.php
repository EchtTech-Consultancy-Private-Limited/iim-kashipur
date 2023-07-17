<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_gallery_tittles', function (Blueprint $table) {
            $table->id();
            $table->integer('gallery_id');
            $table->text('video_url',250);
            $table->text('video_image');
            $table->string('video_title')->nullable();
            $table->text('sort_order')->default(0)->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes();
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
        //
    }
};
