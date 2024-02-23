<?php

namespace App\Http\Controllers\Authentications;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Hash;

class ForgotPassword extends Controller
{
    public function forgot()
    {
        return view('content.authentications.forgot-password');
    }

    public function forgot_password(Request $request)
    {
        $email = $request->input('email');
        $users = User::where('email', $email)->first();

        if (!empty($users)) {
            $users->remember_token = Str::random(40);
            $users->save();

            $mailable = new ForgotPasswordMail($users);

            Mail::to($users->email)->send($mailable);
            return redirect()->back()->with('success', "Link Reset Sudah Dikirim ke Email Anda");
        } else {
            return redirect()->back()->with('error', "Email Tidak Ditemukan");
        }
    }

    public function reset($token)
    {
        $users = User::where('remember_token', '=', $token)->first();
        if (!empty($users)) {
            $data['users'] = $users;
            $data['token'] = $token; // Add this line to pass the token to the view
            return view('content.authentications.resetPassword', $data);
        } else {
            abort(404);
        }
    }

    public function reset_token($token, Request $request)
    {
        $users = User::where('remember_token', '=', $token)->first();

        if (!empty($users)) {
            if ($request->password == $request->konfirmasipassword) {
                $users->password = Hash::make($request->password);
                $users->remember_token = Str::random(40);
                $users->save();

                return redirect('login')->with('success', "Kata sandi berhasil direset");
            } else {
                return redirect()->back()->with('error', "Kata sandi dan konfirmasi tidak sama");
            }
        } else {
            abort(404);
        }
    }
}
