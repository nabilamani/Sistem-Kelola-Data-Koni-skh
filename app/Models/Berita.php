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
        'foto',
    ];

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
        $newNumber = $lastBerita ? intval($lastBerita) + 1 : 1;
        return str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }
}
