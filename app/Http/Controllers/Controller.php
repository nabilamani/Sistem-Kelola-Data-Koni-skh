<?php

namespace App\Http\Controllers;


use App\Models\Berita;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home()
{
    $beritas = Berita::orderBy('tanggal_waktu', 'desc')->take(3)->get();

    return view('viewpublik.index', compact('beritas'));
}


}
