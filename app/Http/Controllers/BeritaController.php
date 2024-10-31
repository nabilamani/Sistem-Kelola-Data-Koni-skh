<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the news articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); // Capture the search input from the request

        // Filter news articles based on user level and search query if provided
        $berita = Berita::when($search, function ($query) use ($search) {
            // Apply search filter on title and event location fields
            $query->where('judul_berita', 'like', "%$search%")
                ->orWhere('lokasi_peristiwa', 'like', "%$search%");
        })
        ->orderBy('tanggal_waktu', 'desc') // Sort results by date in descending order
        ->paginate(4); // Display 4 items per page

        return view('berita.daftar', ['berita' => $berita, 'search' => $search]);
    }

    /**
     * Show the form for creating a new news article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.tambah');
    }

    /**
     * Store a newly created news article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $data = $request->validate([
        'judul_berita' => 'required|string',
        'tanggal_waktu' => 'required|date',
        'lokasi_peristiwa' => 'required|string',
        'isi_berita' => 'required|string',
        'kutipan_sumber' => 'nullable|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $data['tanggal_waktu'] = \Carbon\Carbon::parse($request->tanggal_waktu);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('img'), $filename);
        $data['foto'] = 'img/' . $filename;
    }

    Berita::create($data);

    return redirect('/berita')->with('success', 'News article successfully created!');
}



    /**
     * Display the specified news article.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    /**
     * Show the form for editing the specified news article.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    /**
     * Update the specified news article in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'judul_berita' => ['required', 'string'],
            'tanggal_waktu' => ['required', 'date'],
            'lokasi_peristiwa' => ['required', 'string'],
            'isi_berita' => ['required', 'string'],
            'kutipan_sumber' => ['nullable', 'string'],
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // Assign values from the request to the berita model
        $berita->judul_berita = $request->judul_berita;
        $berita->tanggal_waktu = $request->tanggal_waktu;
        $berita->lokasi_peristiwa = $request->lokasi_peristiwa;
        $berita->isi_berita = $request->isi_berita;
        $berita->kutipan_sumber = $request->kutipan_sumber;

        // Handle the photo file if uploaded
        if ($request->hasFile('foto')) {
            $photoPath = $request->file('foto')->store('photos', 'public');
            $berita->foto = $photoPath;
        }

        // Save the updated berita data
        $berita->save();

        return redirect()->back()->with('success', 'News article successfully updated!');
    }

    /**
     * Remove the specified news article from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->back()->with('success', 'News article successfully deleted!');
    }
}
