<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('admin',function(){
    return view('dashboard');
})->middleware(['auth', 'verified', 'role:admin']);

Route::get('pengurus',function(){
    return '<h1>Hello Pengurus Cabor</h1>';
})->middleware(['auth', 'verified', 'role:pengurus|admin']);

Route::get('badminton',function(){
    return view('badminton');
})->middleware(['auth', 'verified', 'role_or_permission:lihat-data|admin']);




Route::get('/admin', function () {
    return view('dashboard');
});

Route::get('/tambah', function () {
    return view('layouts.tambah');
});

// Route::get('/daftar', function () {
//     return view('Pelatih.daftar');
// });

Route::resource('coaches', CoachController::class);
Route::put('/edit-pelatih/{id}', [CoachController::class, 'update']);
Route::delete('/delete-pelatih/{id}', [CoachController::class, 'destroy']);




require __DIR__.'/auth.php';
