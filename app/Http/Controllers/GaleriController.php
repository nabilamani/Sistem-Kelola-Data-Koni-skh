<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class GaleriController extends Controller
{
    /**
     * Display a listing of the gallery items.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $galeris = Galeri::when($search, function ($query) use ($search) {
            $query->where('judul_galeri', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        })
            ->orderBy('tanggal', 'desc')
            ->paginate(4);

        return view('galeri.daftar', compact('galeris', 'search'));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        return view('galeri.tambah');
    }

    /**
     * Store a newly created gallery item in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul_galeri' => 'required|string',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string',
            'tanggal' => 'required|date',
            'media_path' => 'required|file|mimes:jpeg,png,jpg,mp4,mov,avi|max:20480', // Accepting both images and videos
        ]);

        $data['tanggal'] = Carbon::parse($request->tanggal);

        // Determine the media type and store the file accordingly
        if ($request->hasFile('media_path')) {
            $file = $request->file('media_path');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filePath = 'media/galeri/' . $filename;

            // Determine if media is a photo or video
            $data['media_type'] = in_array($file->extension(), ['mp4', 'mov', 'avi']) ? 'video' : 'photo';
            $file->move(public_path('media/galeri'), $filename);

            $data['media_path'] = $filePath;
        }

        $galeri = new Galeri;
        $data['id'] = $galeri->generateId();
        Galeri::create($data);

        return redirect('/galeris')->with('success', 'Gallery item successfully created!');
    }

    /**
     * Display the specified gallery item.
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show', compact('galeri')); // Create a 'show' view to display details
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.edit', compact('galeri')); // Ensure you have an 'edit' view for editing the gallery item
    }

    /**
 * Update the specified gallery item in storage.
 */
public function update(Request $request, $id)
{
    $galeri = Galeri::findOrFail($id);

    $data = $request->validate([
        'judul_galeri' => 'required|string',
        'tanggal' => 'required|date',
        'kategori' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'media_path' => 'nullable|file|mimes:jpeg,png,jpg,mp4|max:2048',
    ]);

    if ($request->hasFile('media_path')) {
        // Delete old file if exists
        if ($galeri->media_path) {
            Storage::disk('public')->delete($galeri->media_path);
        }
        // Store new file
        $data['media_path'] = $request->file('media_path')->store('media', 'public');
    }

    $galeri->update($data);

    return redirect()->back()->with('success', 'Galeri berhasil diperbarui!');
}


    /**
 * Remove the specified gallery item from storage.
 */
public function destroy($id)
{
    $galeri = Galeri::findOrFail($id);

    // Delete media file if exists
    if ($galeri->media_path) {
        Storage::disk('public')->delete($galeri->media_path);
    }

    $galeri->delete();

    return redirect()->back()->with('success', 'Galeri berhasil dihapus!');
}

}
