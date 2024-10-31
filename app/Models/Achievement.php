<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'sport_category',
        'event_type',
        'athlete_name',
        'description'
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * Generate a custom ID for achievements.
     *
     * @return string
     */
    public function generateId()
    {
        $lastAchievement = Achievement::max('id');
        $lastNumber = $lastAchievement ? intval(substr($lastAchievement, 1)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return 'ACH' . $newNumber;
    }
}
