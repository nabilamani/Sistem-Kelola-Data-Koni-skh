<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    // public function create(): View
    // {
    //     return view('akun.tambah');
    // }

    // /**
    //  * Handle an incoming registration request.
    //  *
    //  * @throws \Illuminate\Validation\ValidationException
    //  */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'level' => ['required', 'string', 'in:Admin,Pengurus Cabor Sepak Bola,Pengurus Cabor Badminton,Pengurus Cabor Bola Basket,Pengurus Cabor Bola Voli,Pengurus Cabor Atletik,Pengurus Cabor Renang,Pengurus Cabor Tinju,Pengurus Cabor Pencak Silat,Pengurus Cabor Futsal'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'level' => $request->level,
    //     ]);

    //     // $user->givePermissionTo('lihat-data');

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME)->with('message', 'Berhasil registrasi!');
    // }
    public function index(): View
    {
        $users = User::paginate(10); // Menampilkan daftar pengguna dengan paginasi
        return view('Akun.daftar', compact('users'));
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id): View
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Tampilkan view edit dengan data user
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi input dari request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'level' => ['required', 'string', 'in:Admin,Pengurus Cabor Sepak Bola,Pengurus Cabor Badminton,Pengurus Cabor Bola Basket,Pengurus Cabor Bola Voli,Pengurus Cabor Atletik,Pengurus Cabor Renang,Pengurus Cabor Tinju,Pengurus Cabor Pencak Silat,Pengurus Cabor Futsal'],
        ]);

        // Update data user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'level' => $request->level,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('users.index')->with('message', 'Akun berhasil diperbarui.');
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete(); // Menghapus user

        return redirect()->back()->with('message', 'User berhasil dihapus.');
    }
}
