<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class BeritaController extends Controller
{
    /**
     * Display a listing of the news articles.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); // Capture the search input from the request

        // Filter news articles based on user level and search query if provided
        $beritas = Berita::when($search, function ($query) use ($search) {
            $query->where('judul_berita', 'like', "%$search%")
                ->orWhere('lokasi_peristiwa', 'like', "%$search%");
        })
        ->orderBy('tanggal_waktu', 'desc') // Sort results by date in descending order
        ->paginate(4); // Display 4 items per page

        return view('berita.daftar', compact('beritas', 'search'));
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('berita.tambah');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_berita' => 'required|string',
            'tanggal_waktu' => 'required|date',
            'lokasi_peristiwa' => 'required|string',
            'isi_berita' => 'required|string',
            'kutipan_sumber' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data['tanggal_waktu'] = Carbon::parse($request->tanggal_waktu);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img/berita'), $filename);
            $data['photo'] = 'img/berita/' . $filename;
        }

        $berita = new Berita;
        $data['id'] = $berita->generateId(); // Generate and assign the custom ID
        $berita->fill($data); // Fill the model with the validated data
        
        
        Berita::create($data);

        return redirect('/beritas')->with('success', 'News article successfully created!');
    }

    /**
     * Display the specified news article.
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified news article.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified news article in storage.
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $data = $request->validate([
            'judul_berita' => 'required|string',
            'tanggal_waktu' => 'required|date',
            'lokasi_peristiwa' => 'required|string',
            'isi_berita' => 'required|string',
            'kutipan_sumber' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data['tanggal_waktu'] = Carbon::parse($request->tanggal_waktu);

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::disk('public')->delete($berita->foto);
            }
            $data['foto'] = $request->file('foto')->store('photos', 'public');
        }

        $berita->update($data);

        return redirect()->back()->with('success', 'News article successfully updated!');
    }

    /**
     * Remove the specified news article from storage.
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect()->back()->with('success', 'News article successfully deleted!');
    }
}
