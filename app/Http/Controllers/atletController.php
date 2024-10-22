<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class atletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $atlet = coach::orderBy('created_at', 'asc')->paginate(4);
    return view('Pelatih.daftar', ['atlet' => $atlet]);
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

        return redirect('/atlet');
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
        $photoPath = $request->file('photo')->store('photos', 'public');
        $coach->photo = $photoPath;
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

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Data pelatih berhasil dihapus');
}

}
