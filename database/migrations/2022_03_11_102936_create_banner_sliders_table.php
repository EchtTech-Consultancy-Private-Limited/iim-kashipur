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
        Schema::create('banner_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title')->nullable();
            $table->string('short')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
            $table->string('linkbutton')->nullable();
            $table->string('heading1')->nullable();
            $table->string('heading2')->nullable();
            $table->string('sort_note')->nullable();
            $table->string('get_in_touch')->nullable();
            $table->string('video_url')->nullable();
            $table->string('color_name')->nullable();
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
        Schema::dropIfExists('banner_sliders');
    }
};
