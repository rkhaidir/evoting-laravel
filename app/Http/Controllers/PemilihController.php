<?php

namespace App\Http\Controllers;

use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Imports\PemilihImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pemilih.index', [
            'title' => 'Data Pemilih',
            'pemilihs' => Pemilih::latest()->filter(request(['cari']))->paginate(5)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pemilih.create', [
            'title' => 'Tambah Pemilih Baru'
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
        $validateData = $request->validate([
            'nomor_pemilih' => 'required|max:64|unique:pemilihs',
            'nama_pemilih' => 'required|max:255'
        ]);

        $validateData['password'] = Hash::make($request->input('nomor_pemilih'));

        Pemilih::create($validateData);

        return redirect('/admin/pemilih')->with('success', 'Data pemilih berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilih $pemilih)
    {
        return view('admin.pemilih.edit', [
            'title' => 'Edit Data Pemilih',
            'pemilih' => $pemilih
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilih $pemilih)
    {
        $rules = [
            'nama_pemilih' => 'required|max:255',
            'verifikasi' => 'required'
        ];

        if ($request->nomor_pemilih != $pemilih->nomor_pemilih) {
            $rules['nomor_pemilih'] = 'required|max:64|unique:pemilihs';
        }

        $validateData = $request->validate($rules);
        $validateData['password'] = Hash::make($request->input('nomor_pemilih'));

        Pemilih::where('id', $pemilih->id)->update($validateData);

        return redirect('/admin/pemilih')->with('success', 'Data pemilih berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilih $pemilih)
    {
        Pemilih::destroy($pemilih->id);
        return redirect('/admin/pemilih')->with('success', 'Data pemilih berhasil dihapus!');
    }

    public function verifikasi(Request $request)
    {
        Pemilih::where('id', $request->id)->update(['verifikasi' => '1']);

        return redirect('/admin/pemilih')->with('success', 'Data pemilih berhasil verifikasi!');
    }

    public function import(Request $request)
    {
        $validateData = $request->validate([
            'excel' => 'required|mimes:csv,xls,xlsx'
        ]);

        if ($request->input('delate_all') == 1) {
            Pemilih::truncate();
        }

        $file = $request->file('excel');

        $fileName = rand() . $file->getClientOriginalName();

        $file->move('import-excel', $fileName);

        Excel::import(new PemilihImport, public_path('/import-excel/' . $fileName));
        File::delete(public_path('/import-excel/' . $fileName));
        return redirect('/admin/pemilih')->with('success', 'Data berhasil di import!');
    }
}
