<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DogFood;

class DogFoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {        
        // Truncate the table before seeding
        DogFood::truncate();
        
        DogFood::create([
            'name' => 'Premium Dog Food',
            'description' => 'High-quality premium dog food with balanced nutrition.',
            'price' => 49.99,
            'dog_breed_id' => 1, // Assuming 1 is the ID of a dog breed
        ]);

        DogFood::create([
            'name' => 'Grain-Free Dog Food',
            'description' => 'Grain-free dog food suitable for sensitive stomachs.',
            'price' => 39.99,
            'dog_breed_id' => 2, // Assuming 2 is the ID of another dog breed
        ]);
    }
}
