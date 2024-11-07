<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'judul_galeri',
        'deskripsi',
        'media_type',
        'media_path',
        'kategori',
        'tanggal',
    ];

    protected $dates = [
        'tanggal',
    ];

    /**
     * Get the formatted date for display.
     *
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->tanggal)->format('d-m-Y');
    }

    /**
     * Generate a custom ID for each new gallery item.
     *
     * @return string
     */
    public function generateId()
    {
        $lastGaleri = Galeri::max('id');
        $lastNumber = $lastGaleri ? intval(substr($lastGaleri, 1)) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        return 'G' . $newNumber;
    }
}
