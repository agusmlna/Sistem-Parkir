<?php

namespace App\Http\Controllers;

use App\Models\JenisMotor;
use App\Models\Merek;
use App\Models\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = Motor::getAllMotor();

        $data = [
            'motor' => $motor,
            'merek' => Merek::all(),
            'jenis' => JenisMotor::all()
        ];
        return view('Master.Motor', $data);
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
        Motor::create([
            'motor' => $request->inputNamaMotor,
            'id_merek' => $request->inputMerek,
            'id_jenis' => $request->inputJenis,
        ]);

        return redirect('/motor')->with(['type' => 'success', 'message' => 'Berhasil Tambah Data Motor']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $motor = Motor::findOrFail($id);

        $motor->update([
            'motor' => $request->inputEditNamaMotor,
            'id_merek' => $request->selectEditMerek,
            'id_jenis' => $request->selectEditJenis,
        ]);

        return redirect('/motor')->with(['type' => 'warning', 'message' => 'Berhasil Edit Data Motor']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Motor::destroy($id);

        return redirect('/motor')->with(['type' => 'danger', 'message' => 'Berhasil Hapus Data Motor']);
    }
}
