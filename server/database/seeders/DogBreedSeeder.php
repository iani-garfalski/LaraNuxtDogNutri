<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DogBreed;

class DogBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate the table before seeding
        DogBreed::truncate();
        
        DogBreed::create([
            'name' => 'Golden Retriever',
            'description' => 'The Golden Retriever is a large-sized breed of dog bred as gun dogs to retrieve shot waterfowl such as ducks and upland game birds during hunting and shooting parties, and were named \'retriever\' because of their ability to retrieve shot game undamaged.',
            'size' => 'Large',
            'average_lifespan' => 10,
            'temperament' => 'Friendly, Intelligent, Devoted',
            'exercise_needs' => 'Moderate',
            'grooming_needs' => 'Moderate',
            'trainability' => 'High',
            'compatibility_with_children' => 'High',
            'compatibility_with_other_pets' => 'High',
            'origin' => 'Scotland',
            'popularity' => 'High',
            'appearance' => 'Golden coat, feathery tail',
            'special_needs' => 'Regular exercise, mental stimulation, attention to grooming',
            'health_issues' => 'Hip dysplasia, certain types of cancer, heart problems',
        ]);

        DogBreed::create([
            'name' => 'Labrador Retriever',
            'description' => 'The Labrador Retriever, or just Labrador, is a large type of retriever-gun dog. The Labrador is one of the most popular breeds of dog in Canada, the United Kingdom and the United States.',
            'size' => 'Large',
            'average_lifespan' => 12,
            'temperament' => 'Outgoing, Even Tempered, Gentle, Agile, Kind',
            'exercise_needs' => 'High',
            'grooming_needs' => 'Low',
            'trainability' => 'High',
            'compatibility_with_children' => 'High',
            'compatibility_with_other_pets' => 'High',
            'origin' => 'Canada',
            'popularity' => 'High',
            'appearance' => 'Short coat, otter tail',
            'special_needs' => 'Regular exercise, mental stimulation',
            'health_issues' => 'Hip dysplasia, obesity, certain types of cancer',
        ]);
    }
}
