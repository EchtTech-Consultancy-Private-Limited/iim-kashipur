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
        Schema::create('organisation_structures', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->string('title_h')->nullable();
            $table->string('designation_h')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('department_h')->nullable();
            $table->string('phone')->nullable();
            $table->string('extension')->nullable();
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('description_h')->nullable();
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
        Schema::dropIfExists('organisation_structures');
    }
};
