<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\SportCategory;

class AthleteController extends Controller
{
    /**
     * Display a listing of the athletes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); // Capture the search input from the request

        // Filter athletes based on user level and search query if provided
        $athletes = Athlete::when($user->level !== 'Admin', function ($query) use ($user) {
            // Extract sport category from user level if not an Admin
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->when($search, function ($query) use ($search) {
                // Apply search filter on name and sport category fields
                $query->where('name', 'like', "%$search%")
                    ->orWhere('sport_category', 'like', "%$search%");
            })
            ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
            ->get(); // Display 4 items per page

        return view('Atlet.daftar', ['athletes' => $athletes, 'search' => $search]);
    }

    /**
     * Show the form for creating a new athlete.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Atlet.tambah');
    }

    public function cetakAthlete()
    {
        $user = Auth::user(); // Get the authenticated user

        // Filter athletes based on user level
        $athletes = athlete::when($user->level !== 'Admin', function ($query) use ($user) {
            // Extract sport category from user level if not an Admin
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
            ->get(); // Retrieve all results based on filtering

        return view('atlet.cetak-atlet', compact('athletes'));
    }
    /**
     * Store a newly created athlete in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'sport_category' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'achievements' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $athlete = new Athlete;
        $data['id'] = $athlete->generateId();


        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());
            $path = $file->storeAs('public/img/athletes', $filename);
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        Athlete::create($data);

        return redirect('/athletes')->with('message', 'Atlet berhasil ditambahkan!');
    }

    /**
     * Display the specified athlete.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $athlete = Athlete::findOrFail($id);
        return view('Atlet.show', compact('athlete'));
    }

    /**
     * Show the form for editing the specified athlete.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'abc';
    }

    /**
     * Update the specified athlete in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $athlete = Athlete::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string',
            'sport_category' => 'required|string',
            'birth_date' => 'required|date',
            'gender' => 'required|in:Laki-laki,Perempuan',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'achievements' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($athlete->photo) {
                Storage::delete(str_replace('storage/', 'public/', $athlete->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '_' . Str::slug($file->getClientOriginalName());
            $path = $file->storeAs('public/img/athletes', $filename);
            $data['photo'] = str_replace('public/', 'storage/', $path);
        }

        $athlete->update($data);

        return redirect()->back()->with('message', 'Data Athlete berhasil diperbarui!');
    }



    /**
     * Remove the specified athlete from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $athlete = Athlete::findOrFail($id);

        if ($athlete->photo) {
            Storage::delete(str_replace('storage/', 'public/', $athlete->photo));
        }

        $athlete->delete();

        return redirect()->back()->with('message', 'Data Athlete berhasil dihapus!');
    }


    public function showAthletes(Request $request)
    {
        $search = $request->input('search');
        $athletes = Athlete::when($search, function ($query, $search) {
            $query->where('name', 'like', "%$search%")
                ->orWhere('sport_category', 'like', "%$search%");
        })->paginate(8);

        $SportCategories = SportCategory::all();

        foreach ($athletes as $athlete) {
            $athlete->age = $athlete->age; // Hitung umur
            $athlete->achievements = $athlete->achievements ?? 'Belum ada prestasi tercatat';
        }

        return view('viewpublik.olahraga.atlet', compact('athletes'));
    }
}
