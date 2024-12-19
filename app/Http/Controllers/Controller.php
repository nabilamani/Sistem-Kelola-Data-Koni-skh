<?php

namespace App\Http\Controllers;


use App\Models\Berita;
use App\Models\Achievement;
use App\Models\Athlete;
use App\Models\Event;
use App\Models\Coach;
use App\Models\Referee;
use App\Models\SportCategory;
use App\Models\User;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
    {
        $eventCount = Event::count();
        $coachCount = Coach::count();
        $athleteCount = Athlete::count();
        $refereeteCount = Referee::count();
        $venueCount = Venue::count();
        $achievementCount = Achievement::count();
        $caborCount = SportCategory::count();


        $beritas = Berita::orderBy('tanggal_waktu', 'desc')->take(3)->get();

        return view('viewpublik.index', compact('beritas', 'eventCount', 'coachCount', 'athleteCount', 'refereeteCount', 'venueCount', 'achievementCount','caborCount'));
    }
}
