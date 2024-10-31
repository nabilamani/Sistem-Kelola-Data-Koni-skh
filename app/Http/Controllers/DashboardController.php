<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Athlete;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Coach; 
use Carbon\Carbon;

class DashboardController extends Controller  
{
    public function index()
    {
        // Retrieve the total counts of events and coaches
        $eventCount = Event::count();
        $coachCount = Coach::count();
        $athleteCount = Athlete::count();
        $achievementCount = Achievement::count();
        
        $upcomingEvents = Event::where('event_date', '>=', now())
        ->orderBy('event_date', 'asc')
        ->get(['name', 'event_date', 'location']);

        // Get achievements data
        $achievements = Achievement::all(['sport_category', 'event_type', 'athlete_name', 'description']);
    

        // Pass these counts and the upcoming events to the view
        return view('dashboard', compact('eventCount', 'coachCount','athleteCount','achievementCount', 'upcomingEvents','achievements'));
    }
}
