<?php

namespace App\Http\Controllers;

use App\Models\JenisMotor;
use Illuminate\Http\Request;

class JenisMotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'jenis' => JenisMotor::all(),
        ];
        return view('master.jenisMotor', $data);
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
        JenisMotor::create([
            'jenis' => $request->inputJenis,
            'biaya' => $request->inputBiaya,
        ]);

        return redirect('/jenis-motor');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisMotor $jenisMotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisMotor $jenisMotor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $jenis = JenisMotor::findOrFail($id);

        $jenis->update([
            'jenis' => $request->editInputJenis,
            'biaya' => $request->editInputBiaya,
        ]);

        return redirect('/jenis-motor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisMotor $jenisMotor)
    {
        JenisMotor::destroy($jenisMotor->id);

        return redirect('/jenis-motor');
    }
}
