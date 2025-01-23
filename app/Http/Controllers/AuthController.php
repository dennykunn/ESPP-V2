<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function process_login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $request->session()->put('user_role', $user->role);
            $request->session()->put('user_name', $user->username);
            $request->session()->put('user_mail', $user->email);
            $request->session()->put('user_photo', $user->photo);

            return redirect()->route('dashboard')->with('success', 'Selamat! Anda berhasil login.');
        }

        return back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Selamat! Anda berhasil logout.');
    }
}
