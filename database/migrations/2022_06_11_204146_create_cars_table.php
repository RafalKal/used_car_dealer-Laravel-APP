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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->date('year');
            $table->integer('owners_count');
            $table->double('course');
            $table->string('engine');
            $table->double('price');
            $table->integer('car_status_id');
            $table->integer('car_model_id');
            $table->integer('transmission_type_id');
            $table->integer('fuel_type_id');
            $table->integer('order_id')->nullable();
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
        Schema::dropIfExists('cars');
    }
};
