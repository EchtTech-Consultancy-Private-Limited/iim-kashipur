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
        Schema::create('orgs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_h');
            $table->string('address');
            $table->string('address_h');
            $table->string('contact');
            $table->string('email');
            $table->string('logo');
            $table->string('time');
            $table->string('logo2')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('url_logo3')->nullable();
            $table->string('url_logo2')->nullable();
            $table->string('url_logo4')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->string('pintrest')->nullable();
            $table->string('logo3')->nullable();
            $table->string('logo4')->nullable();
            $table->string('location')->nullable();
            $table->string('fevicon')->nullable();
            $table->longText('about')->nullable();
            $table->longText('about_h')->nullable();
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
        Schema::dropIfExists('orgs');
    }
};
