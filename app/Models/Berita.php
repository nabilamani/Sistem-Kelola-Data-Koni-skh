<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'judul_berita',
        'tanggal_waktu',
        'lokasi_peristiwa',
        'isi_berita',
        'kutipan_sumber',
        'photo',
    ];

    protected $keyType = 'string';
    public $incrementing = false;

    protected $dates = [
        'tanggal_waktu',
    ];

    public function getFormattedDateAttribute()
    {
        return Carbon::parse($this->tanggal_waktu)->format('d-m-Y H:i');
    }

    public function generateId()
{
    $lastBerita = Berita::max('id');
    $lastNumber = $lastBerita ? intval(substr($lastBerita, 1)) : 0;
    $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
    return 'B' . $newNumber;
}
}
