<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('akun.tambah'); // Assuming a view named 'register'
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'level' => 'required|string|in:Admin,Pengurus Cabor Sepak Bola,Pengurus Cabor Badminton,Pengurus Cabor Bola Basket,Pengurus Cabor Bola Voli,Pengurus Cabor Atletik,Pengurus Cabor Renang,Pengurus Cabor Tinju,Pengurus Cabor Pencak Silat,Pengurus Cabor Futsal',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('/users')->with('success', 'User registered successfully!');
    }

    public function index()
    {
        $users = User::all();
        return view('akun.daftar', compact('users')); // Assuming a view named 'daftar'
    }

    public function edit(User $user)
    {
        return view('akun.edit', compact('user')); // Assuming a view named 'edit'
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'level' => 'required|string|in:Admin,Pengurus Cabor Sepak Bola,Pengurus Cabor Badminton,Pengurus Cabor Bola Basket,Pengurus Cabor Bola Voli,Pengurus Cabor Atletik,Pengurus Cabor Renang,Pengurus Cabor Tinju,Pengurus Cabor Pencak Silat,Pengurus Cabor Futsal',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'level' => $request->level,
        ]);

        return redirect()->route('/users')->with('success', 'User updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('/users')->with('success', 'User deleted successfully!');
    }
}