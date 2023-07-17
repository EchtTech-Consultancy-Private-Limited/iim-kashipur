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
        Schema::create('quick_links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_h')->nullable();
            $table->string('url')->nullable();
            $table->string('quick_category')->nullable();
            $table->string('link_option')->nullable();
            $table->string('link_category')->nullable();
            $table->string('short')->nullable();
            $table->string('image')->nullable();
            $table->string('rupess')->nullable();
            $table->string('start_section')->nullable();
            $table->string('btn_link')->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('quick_links');
    }
};
