<?php

namespace App\Http\Controllers;

use App\Models\Calon;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.calon.index', [
            'title' => 'Data Calon',
            'calons' => Calon::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calon.create', [
            'title' => 'Tambah Calon Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_calon' => 'required|max:64',
            'nomor_urut' => 'required|numeric|unique:calons',
            'gambar' => 'image|file|max:3069'
        ]);

        if ($request->file('gambar')) {
            $validatedData['gambar'] = $request->file('gambar')->store('calon-image');
        }

        $id = Calon::insertGetId($validatedData);

        Vote::create(['calon_id' => $id]);

        return redirect('/admin/calon')->with('success', 'Data calon berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Calon $calon)
    {
        return view('admin.calon.show', [
            'title' => 'Detail calon',
            'calon' => $calon
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Calon $calon)
    {
        return view('admin.calon.edit', [
            'title' => 'Edit Calon',
            'calon' => $calon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Calon $calon)
    {
        $rules = [
            'nama_calon' => 'required|max:64',
            'gambar' => 'image|file|max:3069'
        ];

        if ($request->nomor_urut != $calon->nomor_urut) {
            $rules['nomor_urut'] = 'required|numeric|unique:calons';
        }

        $validatedData = $request->validate($rules);

        if ($request->file('gambar')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar'] = $request->file('gambar')->store('calon-image');
        }

        Calon::where('id', $calon->id)->update($validatedData);

        return redirect('/admin/calon')->with('success', 'Data calon berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calon $calon)
    {
        if ($calon->gambar) {
            Storage::delete($calon->gambar);
        }
        Calon::destroy($calon->id);

        return redirect('/admin/calon')->with('success', 'Data calon berhasil dihapus!');
    }
}
