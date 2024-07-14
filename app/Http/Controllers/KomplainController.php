<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Transaction;
use Illuminate\Http\Request;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komplains = Transaction::leftJoin('motors', 'transactions.id_motor', '=', 'motors.id')
            ->join('jenis_motors', 'motors.id_jenis', '=', 'jenis_motors.id')
            ->join('komplains', 'transactions.id_komplain', '=', 'komplains.id')
            ->select('transactions.*', 'motors.motor', 'jenis_motors.jenis', 'jenis_motors.biaya', 'komplains.id as id_komplain', 'komplains.komplain', 'komplains.status', 'komplains.biaya as biaya_ganti_rugi')
            ->get();

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
