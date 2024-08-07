<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'pegawai' => User::all()
        ];
        return view('pegawai.datapegawai', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'inputEmail'         => 'required',
            'inputPassword'         => 'required',
            'inputName'         => 'required',
            'inputTTL'         => 'required',
            'jenisKelamin'         => 'required',
            'inputAlamat'         => 'required',
            'inputNoHP'         => 'required',
        ]);

        // upload image
        $foto = $request->file('inputFoto');
        $foto->storeAs('public/images', $foto->hashName());

        User::create([
            'email' => $request->inputEmail,
            'password' => $request->inputPassword,
            'name' => $request->inputName,
            'tempat_tanggal_lahir' => $request->inputTTL,
            'jenis_kelamin' => $request->jenisKelamin,
            'alamat' => $request->inputAlamat,
            'no_handphone' => $request->inputNoHP,
            'role' => $request->role,
            'foto' => $foto->hashName(),
        ]);

        return redirect('/data-pegawai')->with(['type' => 'success', 'message' => 'Berhasil Tambah Data Pegawai']);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('editFoto')) {
            // upload image
            $foto = $request->file('editFoto');
            $foto->storeAs('public/images', $foto->hashName());

            $user->update([
                'email' => $request->inputEditEmail,
                'password' => $request->inputEditPassword,
                'name' => $request->inputEditNama,
                'tempat_tanggal_lahir' => $request->inputEditTTL,
                'jenis_kelamin' => $request->radioJenisKelamin,
                'alamat' => $request->inputEditAlamat,
                'no_handphone' => $request->inputEditNoHP,
                'foto' => $foto->hashName(),
            ]);
        } else {
            $user->update([
                'email' => $request->inputEditEmail,
                'password' => $request->inputEditPassword,
                'name' => $request->inputEditNama,
                'tempat_tanggal_lahir' => $request->inputEditTTL,
                'jenis_kelamin' => $request->radioJenisKelamin,
                'alamat' => $request->inputEditAlamat,
                'no_handphone' => $request->inputEditNoHP,
            ]);
        }
        return redirect('/data-pegawai')->with(['type' => 'warning', 'message' => 'Berhasil Edit Data Pegawai']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        User::destroy($id);

        if (session('id') == $id) {
            session()->flush();
            return redirect('/login');
        } else {
            return redirect('/data-pegawai')->with(['type' => 'danger', 'message' => 'Berhasil Hapus Data Pegawai']);
        }
    }
}
