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
            $table->string('medicine_image6')->nullable();
            $table->string('medicine_image7')->nullable();
            $table->string('medicine_image8')->nullable();
            $table->string('medicine_image9')->nullable();
            $table->string('medicine_image10')->nullable();
            $table->string('medicine_image11')->nullable();
            $table->string('medicine_image12')->nullable();
            $table->string('medicine_image13')->nullable();
            $table->string('medicine_image14')->nullable();
            $table->string('medicine_image15')->nullable();
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
