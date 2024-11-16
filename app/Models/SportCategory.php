<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportCategory extends Model
{
    use HasFactory;

    protected $table = 'sport_categories';

    protected $fillable = [
        'nama_cabor',
        'sport_category',
        'deskripsi',
        'puslatcab',
        'kontak',
        'logo',
    ];

    /**
     * Generate a unique ID for the sport category (if needed).
     */
    public function generateId()
    {
        return strtoupper(uniqid('CAB'));
    }
}
