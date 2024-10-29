<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class KoniStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'position',
        'age',
        'birth_date',
        'gender',
        'photo'
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    protected $dates = [
        'birth_date',
    ];

    public function getAgeAttribute()
    {
        return Carbon::parse($this->birth_date)->age;
    }

    public function generateId()
    {
        $lastStructure = KoniStructure::max('id');
        $lastNumber = $lastStructure ? intval(substr($lastStructure, 1)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return 'K' . $newNumber;
    }
}
