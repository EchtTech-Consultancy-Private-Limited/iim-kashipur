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
        Schema::create('quick_link_categories', function (Blueprint $table) {
            $table->id();
            $table->string('Section');
            $table->enum('placement', ['menu-section','Box_section','service_first_section','service_second_section','Pricing_section','project_section','video_Gallery_section','blog_section','footer_top_section','footer_bottom_section'])->default('project_section')->nullable();
            $table->text('sort_order')->default(0);
            $table->integer('status')->default(0);
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
