<?php

namespace App\Http\Controllers\AddUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AddUser extends Controller
{
    public function index()
    {
        return view('content.adduser.add-user');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'department' => 'required|max:255',
            'role' => 'required|max:255',
        ], [
            'password.min' => 'Kata sandi minimal 8 huruf atau angka',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect("/data-pengguna")->with('success', 'Berhasil Menambahkan Pengguna!');
    }
}
