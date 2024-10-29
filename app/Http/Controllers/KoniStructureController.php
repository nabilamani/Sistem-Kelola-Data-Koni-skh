<?php


namespace App\Http\Controllers;

use App\Models\KoniStructures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KoniStructureController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $konistructures = KoniStructures::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                         ->orWhere('position', 'like', '%' . $search . '%');
        })->paginate(10);

        return view('Koni.daftar', compact('konistructures'));
    }

    public function create()
    {
        return view('Koni.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'age' => 'required|integer',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'age', 'birth_date', 'gender']);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos/koni', 'public');
        }

        KoniStructures::create($data);

        return redirect()->route('konistructures.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit(KoniStructures $konistructure)
    {
        return view('Koni.edit', compact('konistructure'));
    }

    public function update(Request $request, KoniStructures $konistructure)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'age' => 'required|integer',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'position', 'age', 'birth_date', 'gender']);

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($konistructure->photo) {
                Storage::disk('public')->delete($konistructure->photo);
            }
            $data['photo'] = $request->file('photo')->store('photos/koni', 'public');
        }

        $konistructure->update($data);

        return redirect()->route('konistructures.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy(KoniStructures $konistructure)
    {
        // Delete photo if exists
        if ($konistructure->photo) {
            Storage::disk('public')->delete($konistructure->photo);
        }

        $konistructure->delete();

        return redirect()->route('konistructures.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
