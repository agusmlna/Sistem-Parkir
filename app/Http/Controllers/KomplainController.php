<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Parkir;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komplains = Parkir::getAllKomplain();

        $data = [
            'title' => 'Detail Data Produk',
            'komplain' => $komplains
        ];
        return view('transaksi.komplain', $data);
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
        //     $komplain = Komplain::create([
        //         'komplain' => $request->inputKomplainProperti,
        //         'status' => 'diproses',
        //     ]);

        //     $transaction = Transaction->update([
        //         'id_merek' => $komplain->id,
        //     ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Komplain $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Komplain $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $komplain = Komplain::findOrFail($id);

        $komplain->update([
            'komplain' => $request->inputGantiRugi,
            'biaya' => $request->inputBiaya,
            'status' => 'selesai',
        ]);

        return redirect('/komplain');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Komplain $report)
    {
        //
    }
}
