<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    /**
     * Display a listing of the venues.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filter venues based on the search query if provided
        $venues = Venue::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('sport_category', 'like', "%$search%")
                    ->orWhere('address', 'like', "%$search%");
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

        return redirect('/venues')->with('success', 'Venue successfully created!');
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

        return redirect()->back()->with('success', 'Venue data successfully updated!');
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

        return redirect()->back()->with('success', 'Venue data successfully deleted!');
    }
}
