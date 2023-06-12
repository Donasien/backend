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
        Schema::create('first_aids', function (Blueprint $table) {
            $table->id();
            $table->string('wound_code');
            $table->string('wound_name');
            $table->text('first_aid')->nullable();
            $table->string('medicine_image1')->nullable();
            $table->string('medicine_image2')->nullable();
            $table->string('medicine_image3')->nullable();
            $table->string('medicine_image4')->nullable();
            $table->string('medicine_image5')->nullable();
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
        Schema::dropIfExists('first_aids');
    }
};
