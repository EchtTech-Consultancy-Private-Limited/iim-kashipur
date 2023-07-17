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
        Schema::create('photo_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_h');
            $table->text('content');
            $table->text('content_h');
            $table->string('cover_image')->nullable();
            $table->string('cover_title')->nullable();
            $table->string('cover_alt')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_alt')->nullable();
            $table->string('file_download')->nullable();
            $table->string('meta_title',50)->nullable();
            $table->string('meta_keywords',100)->nullable();
            $table->string('meta_description',150)->nullable();    
            $table->integer('sort_order')->default(0)->nullable();
            $table->string('slug')->nullable();
            $table->integer('status')->default(0)->nullable();
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
