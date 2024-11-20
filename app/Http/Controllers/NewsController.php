<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Menampilkan Berita Utama dan Berita Latepost.
     */
    public function index()
    {
        // Ambil berita terbaru sebagai "Berita Utama" (misalnya 1 artikel)
        $beritaUtama = Berita::orderBy('tanggal_waktu', 'desc')
            ->first();

        // Ambil berita lainnya sebagai "Berita Latepost" (dikecualikan berita utama)
        $beritaLatepost = Berita::orderBy('tanggal_waktu', 'desc')
            ->skip(1) // Lewati berita pertama (Berita Utama)
            ->take(4) // Ambil 4 berita berikutnya
            ->get();

        // Kirim data ke view
        return view('berita.index', compact('beritaUtama', 'beritaLatepost'));
    }
}
