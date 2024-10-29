<?php

namespace App\Http\Controllers;

use App\Models\Athlete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $athletes = Athlete::when($user->level !== 'admin', function ($query) use ($user) {
            // Extract sport category from user level if not an admin
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->when($search, function ($query) use ($search) {
                // Apply search filter on name and sport category fields
                $query->where('name', 'like', "%$search%")
                    ->orWhere('sport_category', 'like', "%$search%");
            })
            ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
            ->paginate(4); // Display 4 items per page

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
    $athletes = athlete::when($user->level !== 'admin', function ($query) use ($user) {
        // Extract sport category from user level if not an admin
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
            'gender' => ['required', 'in:Male,Female'],
            'weight' => ['required', 'numeric'],
            'height' => ['required', 'numeric'],
            'achievements' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $athlete = new Athlete;
        $data['id'] = $athlete->generateId();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $data['photo'] = 'img/' . $filename;
        }

        Athlete::create($data);

        return redirect('/athletes')->with('success', 'Athlete successfully created!');
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

    // Validate the incoming request
    $request->validate([
        'name' => ['required', 'string'],
        'sport_category' => ['required', 'string'],
        'birth_date' => ['required', 'date'],
        'gender' => ['required', 'in:Male,Female'],
        'weight' => ['required', 'numeric'],
        'height' => ['required', 'numeric'],
        'achievements' => ['nullable', 'string'],
        'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
    ]);

    // Assign values from the request to the athlete model
    $athlete->name = $request->name;
    $athlete->sport_category = $request->sport_category;
    $athlete->birth_date = $request->birth_date;
    $athlete->gender = $request->gender;
    $athlete->weight = $request->weight;
    $athlete->height = $request->height;
    $athlete->achievements = $request->achievements;

    // Handle the photo file if uploaded
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('photos', 'public');
        $athlete->photo = $photoPath;
    }

    // Save the updated athlete data
    $athlete->save();

    return redirect()->back()->with('success', 'Athlete data successfully updated!');
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
        $athlete->delete();

        return redirect()->back()->with('success', 'Athlete data successfully deleted!');
    }
}
