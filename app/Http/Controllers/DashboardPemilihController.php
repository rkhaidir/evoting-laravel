<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Vote;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPemilihController extends Controller
{
    public function index()
    {
        return view('pemilih.index', [
            'calons' => Calon::all()
        ]);
    }

    public function vote(Request $request)
    {
        $calonId = $request->input('calon_id');
        $pemilihId = $request->input('pemilih_id');

        $vote = Vote::where('calon_id', $calonId)->first();

        Vote::where('calon_id', $calonId)->update(['votes' => $vote->votes + 1]);
        Pemilih::where('id', $pemilihId)->update(['status' => 1]);

        Auth::guard('pemilih')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/pemilih')->with('success', 'Selamat! anda sudah melakukan pemilihan');;
    }
}
