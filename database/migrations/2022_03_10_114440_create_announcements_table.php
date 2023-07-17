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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('start_date')->nullable();
            $table->integer('start_time')->nullable();
            $table->integer('end_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('title_h')->nullable();
            $table->text('description')->nullable();
            $table->string('short')->nullable();
            $table->string('rupess')->nullable();
            
            $table->string('link')->nullable();
            $table->string('heading')->nullable();
            $table->text('heading_short')->nullable();
            
            $table->text('description_h')->nullable();
            $table->string('related_docs')->nullable();
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
        Schema::dropIfExists('announcements');
    }
};
