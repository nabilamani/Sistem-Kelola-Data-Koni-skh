<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the schedules.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Filter schedules based on the search query if provided
        $schedules = Schedule::when($search, function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('sport_category', 'like', "%$search%")
                    ->orWhere('venue_name', 'like', "%$search%");
            })
            ->orderBy('date', 'asc')
            ->paginate(4);

        return view('Jadwal.daftar', ['schedules' => $schedules, 'search' => $search]);
    }

    /**
     * Show the form for creating a new schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jadwal.tambah');
    }

    /**
     * Store a newly created schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
            'sport_category' => ['required', 'string'],
            'venue_name' => ['required', 'string'],
            'venue_map' => ['required', 'string'],
        ]);

        Schedule::create($data);

        return redirect('/schedules')->with('success', 'Schedule successfully created!');
    }

    /**
     * Display the specified schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Schedule.show', compact('schedule'));
    }

    /**
     * Show the form for editing the specified schedule.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('Schedule.edit', compact('schedule'));
    }

    /**
     * Update the specified schedule in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $data = $request->validate([
            'name' => ['required', 'string'],
            'date' => ['required', 'date'],
            'sport_category' => ['required', 'string'],
            'venue_name' => ['required', 'string'],
            'venue_map' => ['required', 'string'],
        ]);

        $schedule->fill($data);
        $schedule->save();

        return redirect()->back()->with('success', 'Schedule data successfully updated!');
    }

    /**
     * Remove the specified schedule from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->back()->with('success', 'Schedule data successfully deleted!');
    }
}
