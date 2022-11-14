<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use PDF;

class VoteController extends Controller
{
    public function index()
    {
        return view('admin.votes.index', [
            'title' => 'Hasil Pemilihan',
            'votes' => Vote::join('calons', 'votes.calon_id', '=', 'calons.id')->get()
        ]);
    }

    public function export()
    {
        $data = PDF::loadview('admin.votes.laporan_pdf', [
            'votes' => Vote::join('calons', 'votes.calon_id', '=', 'calons.id')->get()
        ]);

        return $data->download('laporan.pdf');
    }
}
