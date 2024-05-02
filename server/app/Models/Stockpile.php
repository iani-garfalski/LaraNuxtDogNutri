<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DogFood;

class Stockpile extends Model
{
    protected $table = 'stockpiles';
    protected $fillable = ['dog_food_id', 'quantity'];

    public function dogFood()
    {
        return $this->belongsTo(DogFood::class);
    }
}