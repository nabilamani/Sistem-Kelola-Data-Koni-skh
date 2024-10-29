<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $search = $request->input('search'); // Capture the search input from the request

        // Filter coaches based on user level and search query if provided
        $coaches = Coach::when($user->level !== 'admin', function ($query) use ($user) {
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

        return view('Pelatih.daftar', ['coaches' => $coaches, 'search' => $search]);
    }

    public function cetakPelatih()
{
    $user = Auth::user(); // Get the authenticated user

    // Filter coaches based on user level
    $coaches = Coach::when($user->level !== 'admin', function ($query) use ($user) {
        // Extract sport category from user level if not an admin
        $sportCategory = str_replace('Pengurus Cabor ', '', $user->level);
        $query->where('sport_category', $sportCategory);
    })
    ->orderBy('created_at', 'asc') // Sort results by creation date in ascending order
    ->get(); // Retrieve all results based on filtering

    return view('Pelatih.cetak-pelatih', compact('coaches'));
}





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => ['required', 'string'],
            'sport_category' => ['required', 'string'],
            'age' => ['required', 'integer'],
            'address' => ['required', 'string'],
            'description' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);

        // dd($data);
        $coach = new Coach;
        $data['id'] = $coach->generateId();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $data['photo'] = 'img/' . $filename;
        }

        Coach::create($data);

        return redirect('/coaches');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return 'abc';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->name = $request->name;
        $coach->age = $request->age;
        $coach->address = $request->address;
        $coach->sport_category = $request->sport_category;
        $coach->description = $request->description;

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            if ($coach->photo && file_exists(public_path($coach->photo))) {
                unlink(public_path($coach->photo));
            }
    
            // Upload the new photo
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('img'), $filename);
            $data['photo'] = 'img/' . $filename;
        }

        $coach->save();

        return redirect()->back()->with('success', 'Data pelatih berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cari pelatih berdasarkan ID
        $coach = Coach::findOrFail($id);

        // Hapus data pelatih
        $coach->delete();

        if ($coach->photo) {
            Storage::delete('public/img/' . $coach->photo); 
        }
        

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Data pelatih berhasil dihapus');
    }
}
