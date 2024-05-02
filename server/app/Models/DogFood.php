<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DogBreed;

class DogFood extends Model
{
    protected $table = 'dog_foods';
    protected $fillable = ['name', 'description', 'price', 'dog_breed_id'];

    public function dogBreed()
    {
        return $this->belongsTo(DogBreed::class);
    }
}