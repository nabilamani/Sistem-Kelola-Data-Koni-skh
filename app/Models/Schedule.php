<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'sport_category',
        'venue_name',
        'venue_map',
    ];

    // Optional: Define relationships or custom methods as needed for the Schedule model

}
