<?php

namespace App\Http\Controllers\pages;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountSettingsAccount extends Controller
{
  public function index()
  {
    $id = Auth::user()->id;
    $profile = User::find($id);
    return view('content.pages.pages-account-settings-account', compact('profile'));
  }
  public function edit()
  {
    $id = Auth::user()->id;
    $editUser = User::find($id);
    return view('content.pages.edit-profile', compact('editUser'));
  }
  public function store(Request $request)
  {
    $id = Auth::user()->id;
    $data = User::find($id);
    $data->name = $request->name;
    $data->email = $request->email;
    $data->department = $request->department;

    if ($request->file('image')) {
      $file = $request->file('image');

      $filename = date('YmdHi') . $file->getClientOriginalName();
      $file->move(public_path('upload/user-images'), $filename);
      $data['image'] = $filename;
    }
    $data->save();
    return redirect(('/akun-profil'))->with('success', 'Update Berhasil!');
  }

  public function showResetPasswordForm()
  {
    return view('content.pages.reset-password');
  }

  public function resetPassword(Request $request)
  {
    $id = Auth::user()->id;
    $user = User::find($id);

    // Validate the form data
    $request->validate([
      'current_password' => 'required',
      'new_password' => 'required',
      'confirm_password' => 'required|same:new_password',
    ]);

    // Check if the current password matches the user's password
    if (!Hash::check($request->current_password, $user->password)) {
      return redirect()->back()->with('error', 'Kata sandi yang anda masukkan salah.');
    }

    // Update the user's password
    $user->password = bcrypt($request->new_password);
    $user->save();

    return redirect('/akun-profil')->with('success', 'Kata sandi berhasil diubah');
  }

  public function tandaTangan()
  {
    return view('content.pages.tanda-tangan');
  }

  public function storetandatangan(Request $request)
  {
    $id = Auth::user()->id;
    $data = User::find($id);

    if ($request->file('tandatangan')) {
      $file = $request->file('tandatangan');

      // Generate a unique filename based on the current date and time
      $filename = date('YmdHi') . $file->getClientOriginalName();

      // Store the file in the 'data-sign' directory within the 'public' disk
      $file->storeAs('data-sign', $filename, 'public');

      // Update the user's 'tandatangan' field with the generated filename
      $data->tandatangan = $filename;

      // Save the changes to the user model
      $data->save();

      // Redirect the user to the 'akun-profil' page with a success message
      return redirect('/akun-profil')->with('success', 'Berhasil Menambah Tanda Tangan!');
    } else {
      // Handle the case where no file is uploaded
      return redirect('/akun-profil')->with('error', 'No file uploaded!');
    }
  }
}
