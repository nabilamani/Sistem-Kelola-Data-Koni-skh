<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Athlete;
use App\Models\Berita;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Coach;
use App\Models\Referee;
use App\Models\Venue;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve the total counts of events and coaches
        $eventCount = Event::count();
        $coachCount = Coach::count();
        $athleteCount = Athlete::count();
        $refereeteCount = Referee::count();
        $venueCount = Venue::count();
        $achievementCount = Achievement::count();

        // Retrieve the latest news (adjust the number as needed)
        $beritas = Berita::orderBy('tanggal_waktu', 'desc')->take(3)->get();

        $upcomingEvents = Event::where('event_date', '>=', now())
            ->orderBy('event_date', 'asc')
            ->get(['name', 'event_date', 'location']);

        // Get achievements data
        $achievements = Achievement::all(['sport_category', 'event_type', 'athlete_name', 'description']);


        // Pass these counts and the upcoming events to the view
        return view('dashboard', compact('eventCount', 'coachCount', 'athleteCount', 'refereeteCount', 'venueCount', 'achievementCount', 'upcomingEvents', 'achievements', 'beritas'));
    }
}
