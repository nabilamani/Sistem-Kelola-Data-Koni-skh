<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; // Import the Event model
use App\Models\Coach; // Import the Coach model
use Carbon\Carbon;

class DashboardController extends Controller  
{
    public function index()
    {
        // Retrieve the total counts of events and coaches
        $eventCount = Event::count();
        $coachCount = Coach::count();
        
        $upcomingEvents = Event::where('event_date', '>=', now())
        ->orderBy('event_date', 'asc')
        ->get(['name', 'event_date', 'location']);
    

        // Pass these counts and the upcoming events to the view
        return view('dashboard', compact('eventCount', 'coachCount', 'upcomingEvents'));
    }
}
