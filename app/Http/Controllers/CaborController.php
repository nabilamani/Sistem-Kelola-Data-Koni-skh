<?php

namespace App\Http\Controllers;

use App\Models\Cabor; // Pastikan model Cabor sudah ada
use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Event;
use App\Models\SportCategory;
use App\Models\Venue;
use Illuminate\Http\Request;

class CaborController extends Controller
{
    public function home()
    {
        $SportCategories = SportCategory::all();

        // Kirim data ke view 'viewpublik.cabor'
        return view('viewpublik.cabor', compact('SportCategories'));
    }
    public function show(Request $request, $id)
{
    // Ambil kategori olahraga berdasarkan ID yang diklik
    $SportCategory = SportCategory::findOrFail($id);

    // Tangkap input pencarian dari pengguna
    $search = $request->input('search');

    // Ambil data atlet berdasarkan kategori olahraga yang sesuai dan filter pencarian
    $athletes = Athlete::where('sport_category', $SportCategory->sport_category)
        ->when($search, function ($query) use ($search) {
            // Menerapkan pencarian pada kolom nama dan prestasi
            $query->where('name', 'like', "%$search%")
                  ->orWhere('achievements', 'like', "%$search%");
        })
        ->paginate(12);

    // Kirim data ke view
    return view('viewpublik.detail', compact('SportCategory', 'athletes', 'search'));
}

}
