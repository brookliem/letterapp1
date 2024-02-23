<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email:dns|unique:users',
      'password' => 'required|min:5|max:255',
      'division' => 'required|max:255',
      'role' => 'required|max:255'
    ]);

    // $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['password'] = Hash::make($validatedData['password']);

    User::create($validatedData);

    // $request->session()->flash('success', 'Registration successfull! Please login');

    return redirect("/auth/login-basic")->with('success', 'Registration successfull! Please login');
  }
}
