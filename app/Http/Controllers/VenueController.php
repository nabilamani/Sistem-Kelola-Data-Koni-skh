<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenueController extends Controller
{
    /**
     * Display a listing of the venues.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();  // Mendapatkan data pengguna yang sedang login
        $search = $request->input('search');

        // Filter venues berdasarkan level pengguna dan query pencarian
        $venues = Venue::when($user->level !== 'Admin', function ($query) use ($user) {
            // Menghapus prefix "Pengurus Cabor " untuk mendapatkan kategori olahraga
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->when($search, function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%$search%")
                        ->orWhere('sport_category', 'like', "%$search%")
                        ->orWhere('address', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'asc')
            ->paginate(4);

        return view('Venue.daftar', ['venues' => $venues, 'search' => $search]);
    }


    /**
     * Show the form for creating a new venue.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Venue.tambah');
    }

    /**
     * Store a newly created venue in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'sport_category' => ['required', 'string'],
            'map' => ['required', 'string'],
        ]);

        Venue::create($data);

        return redirect('/venues')->with('message', 'Venue successfully created!');
    }

    /**
     * Display the specified venue.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);
        return view('Venue.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified venue.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('Venue.edit', compact('venue'));
    }

    /**
     * Update the specified venue in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'sport_category' => ['required', 'string'],
            'map' => ['required', 'string'],
        ]);

        // Update data from the request to the venue model
        $venue->fill($data);
        $venue->save();

        return redirect()->back()->with('message', 'Venue data successfully updated!');
    }

    /**
     * Remove the specified venue from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();

        return redirect()->back()->with('message', 'Venue data successfully deleted!');
    }
}
