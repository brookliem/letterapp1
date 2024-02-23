<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'email' => 'required|email:dns',
      'password' => 'required'
    ]);

    if (Auth::attempt($credentials)) {
      $user = Auth::user(); // Get the authenticated user

      // Retrieve the user's role from the database
      $role = $user->role; // Adjust this line based on your actual user model and role attribute

      // Store additional information in the session
      $request->session()->regenerate();
      $request->session()->put('role', $role);

      if ($role == 'Admin') {
        return redirect('/');
      } else {
        return redirect()->intended('/');
      }
    }

    return back()->with('loginError', 'Email dan password yang anda masukkan salah');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect("/login");
  }
}
