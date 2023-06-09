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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->integer('target_amount');
            $table->integer('latest_amount')->default(0);
            $table->date('end_date');
            $table->text('description');
            $table->string('type_disaster');
            $table->string('cover_photo');
            $table->string('ktp_photo');
            $table->string('medical_photo');
            $table->string('disease_photo');
            $table->string('sktm_photo');
            $table->string('result_alzheimer')->nullable();
            $table->string('result_lung')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('donations');
    }
};
