<?php

// app/Http/Controllers/PasswordController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Password yang anda masukkan saat ini salah']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);
        
         if (Auth::user()->role == 'admin') {
            session(['url.intended' => url('/admin')]);
        } elseif (Auth::user()->role == 'penyelenggara') {
            session(['url.intended' => route('EO.index')]);
        } else {
            session(['url.intended' => url('/home')]);
        }

        return redirect()->route('password.change')->with('status', 'Password berhasil diubah');

    }

    public function showChangePasswordForm()
    {
         if (Auth::user()->role == 'admin') {
            session(['url.intended' => url('/admin')]);
        } elseif (Auth::user()->role == 'penyelenggara') {
            session(['url.intended' => route('EO.index')]);
        } else {
            session(['url.intended' => url('/home')]);
        }
        return view('tukutick.changePassword');
    }

}

