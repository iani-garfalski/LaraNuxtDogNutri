<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('stockpiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dog_food_id');
            $table->integer('quantity')->unsigned()->default(0);
            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('dog_food_id')->references('id')->on('dog_foods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stockpiles');
    }
};
