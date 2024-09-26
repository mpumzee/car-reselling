<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_name'); // Car Name
            $table->string('car_type'); // Car Type
            $table->decimal('price', 10, 2); // Price
            $table->integer('top_speed'); // Top Speed
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // User who added the car
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cars');
    }
}