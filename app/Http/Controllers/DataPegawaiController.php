<?php

namespace App\Http\Controllers;

use App\Models\DataPegawai;
use Illuminate\Http\Request;

class DataPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pegawai.datapegawai');
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
        //
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
