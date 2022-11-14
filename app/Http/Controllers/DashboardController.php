<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calon;
use App\Models\Pemilih;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'title' => 'Beranda',
            'calon' => Calon::count(),
            'pemilih' => Pemilih::count(),
            'verifikasi' => Pemilih::where('verifikasi', '0')->count(),
            'status' => Pemilih::where('status', '0')->count(),
            'statusDone' => Pemilih::where('status', '1')->count(),
            'verifikasiDone' => Pemilih::where('verifikasi', '1')->count(),
        ]);
    }
}
