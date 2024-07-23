<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Fungsi untuk menampilkan form pendaftaran
    public function create()
    {
        return view('users.create');
    }

    // Fungsi untuk menyimpan pengguna baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user' // Validasi peran
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role, // Menetapkan peran
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // Fungsi untuk menampilkan form edit pengguna
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Fungsi untuk memperbarui pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|string|in:admin,user' // Validasi peran
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role, // Memperbarui peran
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}

