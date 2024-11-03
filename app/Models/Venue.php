<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address',
        'sport_category',
        'map',
    ];

    // Optional: Add custom methods or accessors as needed for Venue model
}
