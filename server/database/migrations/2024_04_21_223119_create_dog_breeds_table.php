<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Truncate the table before seeding
        DogBreed::truncate();
        Schema::create('dog_breeds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->integer('average_lifespan')->nullable();
            $table->text('temperament')->nullable();
            $table->string('exercise_needs')->nullable();
            $table->string('grooming_needs')->nullable();
            $table->string('trainability')->nullable();
            $table->string('compatibility_with_children')->nullable();
            $table->string('compatibility_with_other_pets')->nullable();
            $table->string('origin')->nullable();
            $table->string('popularity')->nullable();
            $table->text('appearance')->nullable();
            $table->text('special_needs')->nullable();
            $table->text('health_issues')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dog_breeds');
    }
};
