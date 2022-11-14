<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PemilihLoginController extends Controller
{
    public function index()
    {
        return view('pemilih.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'nomor_pemilih' => 'required'
        ]);
        $credentials['password'] = $request->nomor_pemilih;

        if (Auth::guard('pemilih')->attempt($credentials)) {

            $request->session()->regenerate();

            if (auth()->guard('pemilih')->user()->verifikasi === 0) {
                return redirect('/pemilih')->with('loginError', 'Akun belum diverifikasi!');
            }

            if (auth()->guard('pemilih')->user()->status === 1) {
                return redirect('/pemilih')->with('loginError', 'Akun sudah melakukan pemilihan!');
            }

            return redirect('/pemilih/dashboard');
        }

        return redirect('/pemilih')->with('loginError', 'Login Failed!');
    }
}
