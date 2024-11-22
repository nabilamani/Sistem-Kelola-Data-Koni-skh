<?php

namespace App\Http\Controllers;

use App\Models\Referee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefereeController extends Controller
{
    /**
     * Display a listing of the referees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search');

        // Filter referees based on user level and search query if provided
        $referees = Referee::when($user->level !== 'Admin', function ($query) use ($user) {
            $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
            $query->where('sport_category', $sportCategory);
        })
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('sport_category', 'like', "%$search%");
            })
            ->orderBy('created_at', 'asc')
            ->paginate(4);

        return view('Wasit.daftar', ['referees' => $referees, 'search' => $search]);
    }

    /**
     * Show the form for creating a new referee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Wasit.tambah');
    }

    /**
     * Store a newly created referee in storage.
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
            'license' => ['nullable', 'string'],
            'experience' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        $referee = new Referee;
        $data['id'] = $referee->generateId();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $data['photo'] = 'img/' . $filename;
        }

        Referee::create($data);

        return redirect('/referees')->with('success', 'Referee successfully created!');
    }

    /**
     * Display the specified referee.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $referee = Referee::findOrFail($id);
        return view('Wasit.show', compact('referee'));
    }

    /**
     * Show the form for editing the specified referee.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referee = Referee::findOrFail($id);
        return view('Wasit.edit', compact('referee'));
    }

    /**
     * Update the specified referee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $referee = Referee::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string'],
            'sport_category' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:Laki-laki,Perempuan'],
            'license' => ['nullable', 'string'],
            'experience' => ['nullable', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // Update data from the request to the referee model
        $referee->fill($data);

        // Handle photo file if uploaded
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $referee->photo = 'img/' . $filename;
        }

        $referee->save();

        return redirect()->back()->with('success', 'Referee data successfully updated!');
    }

    /**
     * Remove the specified referee from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referee = Referee::findOrFail($id);
        $referee->delete();

        return redirect()->back()->with('success', 'Referee data successfully deleted!');
    }
    public function showReferees(Request $request)
    {
        $search = $request->input('search');

        // Query pencarian berdasarkan nama atau cabang olahraga
        $referees = Referee::where('name', 'like', '%' . $search . '%')
            ->orWhere('sport_category', 'like', '%' . $search . '%')
            ->paginate(12);

        return view('viewpublik.olahraga.wasit', compact('referees', 'search'));
    }
}
