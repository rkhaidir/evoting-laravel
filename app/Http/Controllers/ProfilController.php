<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil.index', [
            'title' => 'Profil ' . auth()->user()->name,
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $rules = [
            'name' => 'required|max:255'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|max:64|unique:users';
        }

        if ($request->password != null) {
            $rules['password'] = 'min:5|max:255';
        }

        $validateData = $request->validate($rules);

        if ($request->password != null) {
            $validateData['password'] = Hash::make($request->input('password'));
        }

        User::where('id', $id)->update($validateData);

        return redirect('/admin/profil')->with('success', 'Berhasil update profil!');
    }
}
