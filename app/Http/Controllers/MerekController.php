<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'merek' => Merek::all(),
        ];
        return view('Master.Merek', $data);
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
            'inputMerek'         => 'required',
        ]);

        Merek::create([
            'merek' => $request->inputMerek,
        ]);

        return redirect('/merek-motor')->with(['type' => 'success', 'message' => 'Berhasil Tambah Merek Motor']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Merek $merek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Merek $merek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'editInputMerek'         => 'required',
        ]);

        $jenis = Merek::findOrFail($id);

        $jenis->update([
            'merek' => $request->editInputMerek,
        ]);

        return redirect('/merek-motor')->with(['type' => 'warning', 'message' => 'Berhasil Edit Merek Motor']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Merek::destroy($id);

        return redirect('/merek-motor')->with(['type' => 'danger', 'message' => 'Berhasil Hapus Merek Motor']);
    }
}
