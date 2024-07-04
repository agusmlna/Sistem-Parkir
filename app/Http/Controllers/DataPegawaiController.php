<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
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
        // dd($request->file('inputFoto'));
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

        return redirect('/data-pegawai');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataPegawai $dataPegawai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataPegawai $dataPegawai)
    {
        //
    }
}
