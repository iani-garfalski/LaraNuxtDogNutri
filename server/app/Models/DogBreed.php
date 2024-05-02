<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogBreed extends Model
{
    protected $table = 'dog_breeds';
    protected $fillable = [
        'name',
        'description',
        'size',
        'average_lifespan',
        'temperament',
        'exercise_needs',
        'grooming_needs',
        'trainability',
        'compatibility_with_children',
        'compatibility_with_other_pets',
        'origin',
        'popularity',
        'appearance',
        'special_needs',
        'health_issues',
    ];
}
