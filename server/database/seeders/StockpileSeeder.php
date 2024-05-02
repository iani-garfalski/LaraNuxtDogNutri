<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Stockpile;

class StockpileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Populate stockpiles with dummy data
        Stockpile::create([
            'dog_food_id' => 1,
            'quantity' => 100,
        ]);

        Stockpile::create([
            'dog_food_id' => 2,
            'quantity' => 0,
        ]);
    }
}
